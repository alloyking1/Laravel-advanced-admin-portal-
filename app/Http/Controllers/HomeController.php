<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Constructors that enable middlewares.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); //auth middleware
        $this->middleware('admin'); //admin middleware
        $this->middleware('adminSuper'); //adminSuper middleware
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    
}
