<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Area;
use App\Parish;
use Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;

class AdminController extends Controller
{

    /**
     * Show the application admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get portal status
        $admin = User::where('isAdminSuper', '1')->first();
        $portalStatus = $admin->portalStatus; 

        $total = User::count();
        return view('admin.index', compact('total','portalStatus'));
    }

    // display form to add campers
    public function create(){
        //get areas from db
        $area = Area::all();

        // get parish from db
        $parish = Parish::all();

        return view('admin.add', compact('area','parish'));
    }

    // store campers details
    public function store(Request $request){
        // get portal status
        $admin = User::where('isAdminSuper', '1')->first();
        $portalStatus = $admin->portalStatus;

        //get areas from db
        $area = Area::all();

        // get parish from db
        $parish = Parish::all();
        
        if($portalStatus == true){
            
            //validate request and store area admin
            $this->validate(request(),[
                "firstname" => "required|string",
                "lastname" => "required|string",
                "email" => "nullable|email",
                "phone" => "nullable|integer",
                "password" => "nullable|string",
                "dob" => "required|date",
                "address" => "required",
                "gender" => "required|string",
                "area" => "required|string",
                "parish" => "required|string"
            ]);
            
            // encrypt password
            $pass = Hash::make($request['password']);
            
            $user = new User;
            $user -> firstname = $request['firstname'];
            $user -> lastname = $request['lastname'];
            $user -> email = $request['email'];
            $user -> password= $pass;
            $user -> dob = $request['dob'];
            $user -> address = $request['address'];
            $user -> gender = $request['gender'];
            $user -> area = $request['area'];
            $user -> parish = $request['parish'];
            $user->save();
            return view('admin.add', compact('area','parish'))->with('added', 'Camper added');
            
        }else{
            return view('admin.add', compact('area','parish'))->with('closed', 'Portal closed for now');
        }
    }

    // show all campers
    public function show(){

        // get loged in admin area
        $adminArea = Auth::user()->area;

        // search for users with same area
        $users = User::where('area', $adminArea)->get();

        // return view('admin.all_campers', compact('users'));
        return Datatables::of($users)->make(true);
        // return view(Datatables::of($users)->make(true));
    }

    // show all campers view to make data tbl call
    public function showView(){
        return view('admin.all_campers');
    }

    // show all parish datatable api return val
    public function showParish(){

        // get loged in admin area
        $adminArea = Auth::user()->area;

        // search for users with same area
        $parish = Parish::where('parish_area_name', $adminArea)->get();
        return Datatables::of($parish)->make(true);
    }

    // show all parish datatable view return
    public function showParishView(){
        return view('admin.all_parish');
    }


    /**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return view('admin.data_table');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {   
        // get loged in admin area
        $adminArea = Auth::user()->area;

        // search for users with same area
        $users = User::where('area', $adminArea)->get();

        return Datatables::of($users)->make(true);
    }
}
