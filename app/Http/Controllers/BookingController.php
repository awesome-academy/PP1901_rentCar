<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Model\Vehicle;
use App\Model\Renting;

class BookingController extends Controller
{
    public function add_cart(Request $request)
    {
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
        $carts[$id_vehicle]['name'] = $vehicle_info[0]['name'];
        $carts[$id_vehicle]['type'] = $vehicle_info[0]['type']['name'];
        $carts[$id_vehicle]['color'] = $vehicle_info[0]['color']['name'];
        $carts[$id_vehicle]['ve_status'] = $vehicle_info[0]['ve_status']['name'];
        $carts[$id_vehicle]['startdate'] = '';
        $carts[$id_vehicle]['enddate'] = '';
        $carts[$id_vehicle]['price'] = $vehicle_info[0]['price'];
        $carts[$id_vehicle]['total'] = '';
        Session::put('carts', $carts);

        return redirect()->back();
    }

    public function checkout()
    {
        $carts = Session::get('carts');
        if (Session::has('carts') && count($carts) > 0) {

            return view('member/checkout', compact('carts'));
        } else

            return view('member/non_checkout');
    }

    public function caculator(Request $request)
    {
        $carts = Session::get('carts');
        foreach ($request->post() as $k => $v) {
            $tem = explode('_', $k);
            $id = (isset($tem[2])) ? $tem[2] : 0;
            if ($id == 0) continue;
            $title = $tem[0] . $tem[1];
            $carts[$id][$title] = $v;
            if (isset($carts[$id]['enddate'])) {
                $total = (strtotime($carts[$id]['enddate']) - strtotime($carts[$id]['startdate'])) / (24 * 60 * 60);
                $carts[$id]['total'] = $total * $carts[$id]['price'];
            }
        }
        Session::put('carts', $carts);

        return redirect()->route('checkout');
    }

    public function delete_cart(Request $request)
    {
        $carts = Session::get('carts');
        unset($carts[$request->get('id')]);
        Session::put('carts', $carts);

        echo $request->get('id');
    }

    public function confirm()
    {
        $user = Auth::user();
        $carts = Session::get('carts');

        return view('member/confirm', compact('carts', 'user'));
    }

    public function store_cart(Request $request)
    {
        $carts = Session::get('carts');
        $data = [];
        foreach ($carts as $cart) {
            $pre_insert = array(
                'user_id' => Auth::user()->id,
                'vehicle_id' => $cart['id'],
                'start_date' => $cart['startdate'],
                'end_date' => $cart['enddate'],
                'total' => $cart['total'],
                'created_at' => date('Y-m-d H-i-s'),
                'updated_at' => date('Y-m-d H-i-s'),
            );
            $data[] = $pre_insert;
        }
        Renting::insert($data);
        $request->session()->forget('carts');

        return view('member/successfully');
    }
}
