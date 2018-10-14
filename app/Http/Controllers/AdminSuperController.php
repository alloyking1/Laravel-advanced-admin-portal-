<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Area;
use App\Parish;
use App\User;
use Yajra\Datatables\Datatables;

class AdminSuperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //super admin dashboard
        $areas = Area::count();
        $campers = User::count();

        return view('adminSuper.index', compact('areas', 'campers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createArea()
    {
        //create a new area
        return view('adminSuper.areaCreate');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCamper()
    {   
        //get areas from db
        $area = Area::all();

        // get parish from db
        $parish = Parish::all();

        //create a new camper
        return view('adminSuper.addCamper',compact('area','parish'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAreaAdmin()
    {   
        //create an area admin

        //get areas from db
        $area = Area::all();

        // get parish from db
        $parish = Parish::all();

        //pass view with area info
        return view('adminSuper.addAdmin', compact('area','parish'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeArea(Request $request)
    {
        //validate and store area
        $this->validate(request(),[
            "areaName" => "required|string",
            "areaAdmin" => "required|string",
            "password" => "required|string",
        ]);
        
        // hash admin password
        // $pass = Hash::make($request['password']); 

        //save in db
        $area = new Area;
        $area->area_name = $request['areaName'];
        $area->area_admin_name =  $request['areaAdmin'];
        $area->area_admin_password = $request['password'];
        $area->save();

        return redirect('/adminSuper')->with('added', 'Area added');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCamper(Request $request)
    {
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
            return view('adminSuper.addAdmin', compact('area','parish'))->with('added', 'Camper added');
        }else{
            return view('adminSuper.addAdmin', compact('area','parish'))->with('closed', 'Portal closed for now');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAreaAdmin(Request $request)
    {
        //get areas from db
        $area = Area::all();

        // get parish from db
        $parish = Parish::all();

        //validate request and store area admin
        $this->validate(request(),[
            "firstname" => "required|string",
            "lastname" => "required|string",
            "email" => "nullable|email",
            "phone" => "nullable|integer",
            "password" => "required|string",
            "dob" => "nullable|date",
            "address" => "required",
            "gender" => "required|string",
            "area" => "required|string",
            "parish" => "required|string"
        ]);
        
        // encrypt password
        $pass = Hash::make($request['password']);
        //save in database
        $adminStatus = 1;
        
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
        $user->  isAdmin = $adminStatus;
        $user->save();
        return view('adminSuper.addAdmin', compact('area','parish'))->with('added', 'Area Admin added');
    }

    
    /**
     * get campers data
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCampersData()
    {
        //get all campers from every area
        $users = User::where('isAdmin', NULL)->get();
        return Datatables::of($users)->make(true);
    }

    // show view for all campers
    public function showCampers(){
        return view('adminSuper.viewAllCampers');
    }


    // show all areas
    public function areaShow(){
        // get all areas from db
        $area = Area::all();
        // pass along with view
        return view('adminSuper.viewAllArea');
    }

    // all area data
    public function areaShowData(){
        // get all areas from db
        $area = Area::all();
        return Datatables::of($area)->make(true);
    }


    // show all parish
    public function parishShow(){
        
        // pass along with view
        return view('adminSuper.viewAllParish');
    }

    // show parish data
    public function parishShowData(){
        // get all parish from db
        $parish = Parish::all();
        return Datatables::of($parish)->make(true);
    }

    // show open and close portal form
    public function portal(){
        // get portal status 
        $admin = User::where('isAdminSuper', '1')->first();
        $portalStatus = $admin->portalStatus;

        // pass along with view
        return view('adminSuper.portal', compact('portalStatus'));
    }

    // habdle open portal request
    public function portalOpen(Request $request){

        // get request val
        $status = $request['portalSelect'];
        
        if($status == "open"){
            // get admin super from db
            $admin = User::where('isAdminSuper', '1')->first();
            $admin->portalStatus = true;
            $admin->save();

            // get portal status
            $admin = User::where('isAdminSuper', '1')->first();
            $portalStatus = $admin->portalStatus;

            // passwith view
            return view('adminSuper.portal', compact('portalStatus'))->with('status', 'portal opend');

        }else{
            if($status == "close"){
                // get admin super from db
                $admin = User::where('isAdminSuper', '1')->first();
                $admin->portalStatus = false;
                $admin->save();

                // get portal status
                $admin = User::where('isAdminSuper', '1')->first();
                $portalStatus = $admin->portalStatus; 

                return view('adminSuper.portal', compact('portalStatus'))->with('status', 'portal opend');
            }
        }
        
    }
}
