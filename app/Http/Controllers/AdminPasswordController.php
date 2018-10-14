<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminPasswordController extends Controller
{
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //display form to edit password by admon
        return view('admin.pass_reset');
    }

    /**
     * Change admin password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //validate request
        $this->validate(request(),[
            'pass_reset'=>'required'
        ]);
        
        //encryp password
        $pass = Hash::make($request['pass_reset']);
        
        //store
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->password = $pass;
        $user->save();
        return redirect('/admin')->with('pass_success', 'password changed');
    }

}
