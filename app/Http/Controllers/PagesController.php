<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //middle ware in constructor
    public function __construct(){
        $this->middleware('guest');
    }

    // return index
    public function index(){
        return view('welcome');
    }
}
