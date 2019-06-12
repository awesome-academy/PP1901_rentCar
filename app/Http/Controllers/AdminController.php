<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Vehicle;
use App\Model\Renting;
use App\Model\User;

class AdminController extends Controller
{
    public function home_renting()
    {
        $rentings = renting::all();

        return view('admin.home_renting', compact('rentings'));
    }

    public function home_user()
    {
        $users = user::all();

        return view('admin.home_user', compact('users'));
    }

    public function home_vehicle()
    {
        $vehicles = vehicle::all();

        return view('admin.home_vehicle', compact('vehicles'));
    }

    public function ajax_user(Request $request){
        $users = user::all();
        echo view('admin/users_ajax',compact('users'));
    }
}
