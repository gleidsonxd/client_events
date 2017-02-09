<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session('logado') == 1) {
		    return view("index");
	    }else{
	        return view("mlogin");
	    }
        
    }
    public function noadmin()
    {
        if (session('logado') != 1) {
		    return view("mlogin");
	    }
        if (session('adm') == false) {
		    return view("noadmin");
	    }
        
    }
}
