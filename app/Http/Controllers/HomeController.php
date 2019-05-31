<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Type;
use App\Model\Vehicle;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $vehicle = vehicles::all();
        $type = type::all();
        return view('welcome',compact('vehicle','type'));
    }
}
