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

        $all_users = User::all()->toArray();
        $key_user = [];
        foreach ($all_users as $user) {
            $key_user[$user['id']] = $user['name'];
        }

        $all_vehicles = Vehicle::all()->toArray();
        $key_vehicle = [];
        foreach ($all_vehicles as $vehicle) {
            $key_vehicle[$vehicle['id']] = $vehicle['name'];
        }

        return view('admin.home_renting', compact('rentings', 'key_user', 'key_vehicle'));
    }

    public function home_user()
    {
        $users = user::all();

        $all_roles = Role::all()->toArray();
        $key_role = [];
        foreach ($all_roles as $role) {
            $key_role[$role['id']] = $role['name'];
        }

        return view('admin.home_user', compact('users', 'key_role'));
    }

    public function home_vehicle()
    {
        $vehicles = vehicle::all();

        $all_types = Type::all()->toArray();
        $key_type = [];
        foreach ($all_types as $type) {
            $key_type[$type['id']] = $type['name'];
        }

        $all_brands = Brand::all()->toArray();
        $key_brand = [];
        foreach ($all_brands as $brand) {
            $key_brand[$brand['id']] = $brand['name'];
        }

        $all_colors = Color::all()->toArray();
        $key_color = [];
        foreach ($all_colors as $color) {
            $key_color[$color['id']] = $color['name'];
        }

        $all_ve_statuses = Ve_status::all()->toArray();
        $key_ve_status = [];
        foreach ($all_ve_statuses as $ve_status) {
            $key_ve_status[$ve_status['id']] = $ve_status['name'];
        }

        $all_statuses = Status::all()->toArray();
        $key_status = [];
        foreach ($all_statuses as $status) {
            $key_status[$status['id']] = $status['name'];
        }

        return view('admin.home_vehicle', compact('vehicles', 'key_type', 'key_brand', 'key_color', 'key_ve_status', 'key_status'));
    }

    public function edit_user($id)
    {
        $roles = $this->roles;
        $users = User::find($id);

        return view('admin.edit_user', compact('users', 'roles'));
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

        return view('admin.edit_user', compact('users', 'roles'))->with('mess', $mess);
    }

    public function delete_user(Request $request)
    {
        $users = User::find($request->get('user_id'));
        $users->delete();

        return redirect()->route('homeUser')->with('mess_del_user', trans('messages.delete message'));
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
            $mess = trans('messages.add message');
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

        return redirect()->route('homeVehicle')->with('mess_del_vehicle', trans('messages.delete message'));
    }
}
