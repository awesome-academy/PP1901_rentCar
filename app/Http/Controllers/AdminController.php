<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Type;
use App\Model\Vehicle;
use App\Model\Renting;
use App\Model\User;

class AdminController extends Controller
{
    public function home()
    {
        $rentings = renting::all();
        $users = user::all();
        return view('admin.home', compact('rentings','users'));
    }

    public function ajax_user(Request $request){
        $users = user::all();
        echo view('admin/users_ajax',compact('users'));
    }
}
