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
}
