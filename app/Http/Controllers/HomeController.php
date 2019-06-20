<?php

namespace App\Http\Controllers;

use App\Model\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Type;
use App\Model\Vehicle;
use App\Model\Color;
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
        $types = Type::all();
        $vehicles = Vehicle::with([
            'status' => function ($query) {
                $query->select(['statuses.id', 'statuses.name']);
            },

            've_status' => function ($query) {
                $query->select(['ve_statuses.id', 've_statuses.name']);
            }
        ])->get()->toArray();

        return view('welcome', compact('vehicles', 'types'));
    }

    public function ajax(Request $request)
    {
        $vehicles = Type::find($request->get('id'))->vehicles()->with([
            'status' => function ($query) {
                $query->select(['statuses.id', 'statuses.name']);
            },

            've_status' => function ($query) {
                $query->select(['ve_statuses.id', 've_statuses.name']);
            }])->get()->toArray();

        return view('ajax', compact('vehicles'));
    }

    public function vehicle_info($id){
        $types = Type::all();
        $brands = Brand::all();
        $colors = Color::all();
        $ve_statuses = Ve_status::all();
        $statuses = Status::all();
        $vehicles = Vehicle::find($id);


        return view('vehicle_info', compact('vehicles', 'types', 'brands', 'colors', 've_statuses', 'statuses'));
    }
}
