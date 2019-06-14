<?php

namespace App\Http\Controllers;

use App\Model\Type;
use Illuminate\Http\Request;
use App\Model\Vehicle;
use App\Model\Renting;
use App\Model\User;
use App\Model\Brand;
use App\Model\Color;
use App\Model\Ve_status;
use App\Model\Status;
use App\Model\Role;

class AdminController extends Controller
{
    public $types;
    public $brands;
    public $colors;
    public $ve_statuses;
    public $statuses;
    public $roles;

    public function __construct()
    {
        $this->types = Type::all();
        $this->brands = Brand::all();
        $this->colors = Color::all();
        $this->ve_statuses = Ve_status::all();
        $this->statuses = Status::all();
        $this->roles = Role::all();
    }

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

    public function edit_user($id)
    {
        $roles = $this->roles;
        $users = User::find($id);

        return view('admin.edit_user', compact('users','roles'));
    }

    public function update_user(Request $request, $id)
    {
        $roles = $this->roles;
        $users = User::find($id);
        $users->name = $request->get('name');
        $users->birthday = $request->get('birthday');
        $users->email = $request->get('email');
        $users->address = $request->get('address');
        $users->phone = $request->get('phone');
        $users->card_id = $request->get('card_id');
        $users->role_id = $request->get('role_id');
        $mess = "";
        if ($users->save()) {
            $mess = trans('messages.update message');
        }

        return view('admin.edit_user', compact('users','roles'))->with('mess', $mess);
    }

    public function delete_user(Request $request)
    {
        $users = User::find($request->get('user_id'));
        $users->delete();

        return redirect()->route('home_user')->with('mess_del_user', trans('messages.delete user message'));
    }

    public function create_vehicle()
    {
        $types = $this->types;
        $brands = $this->brands;
        $colors = $this->colors;
        $ve_statuses = $this->ve_statuses;
        $statuses = $this->statuses;

        return view('admin.add_vehicle', compact('types', 'brands', 'colors', 've_statuses', 'statuses'));
    }

    public function store_vehicle(Request $request)
    {
        $types = $this->types;
        $brands = $this->brands;
        $colors = $this->colors;
        $ve_statuses = $this->ve_statuses;
        $statuses = $this->statuses;
        $vehicles = new Vehicle();
        $vehicles->name = $request->get('name');
        $vehicles->type_id = $request->get('type_id');
        $vehicles->brand_id = $request->get('brand_id');
        $vehicles->number_plate = $request->get('number_plate');
        $vehicles->color_id = $request->get('color_id');
        $vehicles->content = $request->get('content');
        $vehicles->ve_status_id = $request->get('ve_status_id');
        $vehicles->price = $request->get('price');
        $vehicles->status_id = $request->get('status_id');
        $mess = "";
        if ($vehicles->save()) {
            $mess = trans('messages.add vehicle message');
        }

        return view('admin.add_vehicle', compact('types', 'brands', 'colors', 've_statuses', 'statuses'))->with('mess', $mess);
    }

    public function edit_vehicle($id)
    {
        $types = $this->types;
        $brands = $this->brands;
        $colors = $this->colors;
        $ve_statuses = $this->ve_statuses;
        $statuses = $this->statuses;
        $vehicles = Vehicle::find($id);

        return view('admin.edit_vehicle', compact('vehicles', 'types', 'brands', 'colors', 've_statuses', 'statuses'));
    }

    public function update_vehicle(Request $request, $id)
    {
        $types = $this->types;
        $brands = $this->brands;
        $colors = $this->colors;
        $ve_statuses = $this->ve_statuses;
        $statuses = $this->statuses;
        $vehicles = Vehicle::find($id);
        $vehicles->name = $request->get('name');
        $vehicles->type_id = $request->get('type_id');
        $vehicles->brand_id = $request->get('brand_id');
        $vehicles->color_id = $request->get('color_id');
        $vehicles->ve_status_id = $request->get('ve_status_id');
        $vehicles->price = $request->get('price');
        $vehicles->status_id = $request->get('status_id');
        $mess = "";
        if ($vehicles->save()) {
            $mess = trans('messages.update message');
        }

        return view('admin.edit_vehicle', compact('vehicles', 'types', 'brands', 'colors', 've_statuses', 'statuses'))->with('mess', $mess);
    }

    public function delete_vehicle(Request $request)
    {
        $vehicles = Vehicle::find($request->get('vehicle_id'));
        $vehicles->delete();

        return redirect()->route('home_vehicle')->with('mess_del_vehicle', trans('messages.delete vehicle message'));
    }
}
