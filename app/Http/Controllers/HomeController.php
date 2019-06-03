<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Type;
use App\Model\Vehicle;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function home()
    {
        $vehicles = vehicle::all();
        $types = type::all();
        return view('welcome', compact('vehicles', 'types'));
    }
}