<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Type;
use App\Model\Vehicle;
use App\Model\Status;
use App\Model\Ve_status;

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

    public function home()
    {
        $vehicles = Vehicle::all();
        $types = Type::all();

        $all_statuses = Status::all()->toArray();
        $key_status = [];
        foreach ($all_statuses as $status){
            $key_status[$status['id']] = $status['name'];
        }

        $all_ve_statuses = Ve_status::all()->toArray();
        $key_ve_status = [];
        foreach ($all_ve_statuses as $ve_status) {
            $key_ve_status[$ve_status['id']] = $ve_status['name'];
        }

        return view('welcome', compact('vehicles', 'types', 'key_status', 'key_ve_status'));
    }

    public function ajax(Request $request)
    {
        $vehicles = Type::find($request->get('id'))->vehicles()->get();
        echo view('ajax', compact('vehicles'));
    }
}
