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
use Illuminate\Support\Facades\Session;

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

    public function add_cart(Request $request){
        Session::forget('carts');
        $carts = Session::get('carts');
        $id_vehicle = $request->get('vehicle_id');
        $vehicle_info = Vehicle::where('id', $id_vehicle)->with([
            'type' => function ($query) {
                $query->select(['types.id', 'types.name']);
            },

            'color' => function ($query) {
                $query->select(['colors.id', 'colors.name']);
            },

            've_status' => function ($query) {
                $query->select(['ve_statuses.id', 've_statuses.name']);
            }
        ])->get()->toArray();
        $carts[$id_vehicle]['id'] = $vehicle_info[0]['id'];
        $carts[$id_vehicle]['type'] = $vehicle_info[0]['type']['name'];
        $carts[$id_vehicle]['color'] = $vehicle_info[0]['color']['name'];
        $carts[$id_vehicle]['ve_status'] = $vehicle_info[0]['ve_status']['name'];
        $carts[$id_vehicle]['price'] = $vehicle_info[0]['price'];

        Session::put('carts', $carts);

        return redirect()->back();
    }

    public function checkout() {
        $carts = Session::get('carts');
        dd($carts);

        return view('member/checkout', compact('carts'));
    }
}
