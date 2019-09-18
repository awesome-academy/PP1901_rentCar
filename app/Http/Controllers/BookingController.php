<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Repositories\VehicleRepositoryInterface;

class BookingController extends Controller
{
    protected $VehicleRepository;

    public function __construct(
        VehicleRepositoryInterface $VehicleRepository
    )
    {
        $this->VehicleRepository = $VehicleRepository;
    }

    public function add_cart(Request $request)
    {
        if (Auth::check()) {
            $carts = Session::get('carts');
            $now = Carbon::now()->toDateString();
            $id_vehicle = $request->get('vehicle_id');
            $vehicle_info = $this->VehicleRepository->getDetailVehicle($id_vehicle);
            $renting_infos = $this->VehicleRepository->getRentingWithVehicleID($id_vehicle);
            $carts[$id_vehicle]['id'] = $vehicle_info['id'];
            $carts[$id_vehicle]['name'] = $vehicle_info['name'];
            $carts[$id_vehicle]['name'] = $vehicle_info['name'];
            $carts[$id_vehicle]['type'] = $vehicle_info['type']['name'];
            $carts[$id_vehicle]['color'] = $vehicle_info['color']['name'];
            $carts[$id_vehicle]['ve_status'] = $vehicle_info['ve_status']['name'];
            foreach ($renting_infos as $renting_info) {
                if ($renting_info['start_date'] >= $now || $renting_info['end_date'] >= $now ){
                    $carts[$id_vehicle]['startdata'][] = $renting_info['start_date'];
                    $carts[$id_vehicle]['enddata'][] = $renting_info['end_date'];
                }
            }
            $carts[$id_vehicle]['startdate'] = '';
            $carts[$id_vehicle]['enddate'] = '';
            $carts[$id_vehicle]['price'] = $vehicle_info['price'];
            $carts[$id_vehicle]['total'] = '';
            Session::put('carts', $carts);

            return redirect()->back();
        } else

            return redirect()->route('login');
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
        $now = Carbon::now()->toDateString();
        $carts = Session::get('carts');
        foreach ($carts as $cart) {
            if (isset($cart['startdate']) && isset($cart['enddate'])) {
                if ($cart['startdate'] < $now || $cart['enddate'] < $cart['startdate']) {
                    Session::flash('message1', "Please input date again!");

                    return redirect()->back();
                } else {

                    return view('member/confirm', compact('carts', 'user'));
                }
            } else {
                Session::flash('message2', "Start date, end date not empty!");

                return redirect()->back();
            }
        }
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
            $vehicles = $this->VehicleRepository->getVehicle($pre_insert['vehicle_id']);
            $current_count = $vehicles->count;
            $vehicles->count = $current_count + 1;
            $vehicles->save();
        }
        $this->VehicleRepository->insertRenting($data);
        $request->session()->forget('carts');

        return view('member/successfully');
    }

    public function renting_info()
    {
        $users = Auth::user();
        $rentings = $this->VehicleRepository->getRentingWithUserID($users['id']);
        if ($rentings) {

            return view('member/renting_info', compact('rentings'));
        } else

            return view('member/non_renting');
    }
}
