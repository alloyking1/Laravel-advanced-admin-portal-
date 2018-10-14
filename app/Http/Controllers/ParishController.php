<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Area;
use App\Parish;
use App\User;

class ParishController extends Controller
{
    //display parish form\
    public function create(){

        //get areas from db
        $area = Area::all();

        return view('adminSuper.addParish', compact('area'));
    }

    public function save(Request $request){

        //get areas from db
        $area = Area::all();

        // save parish 
        $this->validate(request(),[
            "parishName" => "required|string",
            "area" => "required|string",
        ]);
        
        // save 
        $parish = new Parish;
        $parish->parish_name = $request['parishName'];
        $parish->parish_area_name = $request['area'];
        $parish->save();

        return view('adminSuper.addParish',  compact('area'))->with('sucess', 'parish added');
    }
}
