<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositoryInterface;
use App\Repositories\VehicleRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public $types;
    public $brands;
    public $colors;
    public $ve_statuses;
    public $statuses;
    public $roles;

    protected $UserRepository;
    protected $VehicleRepository;

    public function __construct(
        UserRepositoryInterface $UserRepository,
        VehicleRepositoryInterface $VehicleRepository
    )
    {
        $this->UserRepository = $UserRepository;
        $this->VehicleRepository = $VehicleRepository;
        $this->types = $this->VehicleRepository->getAllType();
        $this->brands = $this->VehicleRepository->getAllBrand();
        $this->colors = $this->VehicleRepository->getAllColor();
        $this->ve_statuses = $this->VehicleRepository->getAllVeStatus();
        $this->statuses = $this->VehicleRepository->getAllStatus();
        $this->roles = $this->UserRepository->getAllRole();
    }

    public function home_renting()
    {
        $rentings = $this->VehicleRepository->getAllRenting();

        return view('admin.home_renting', compact('rentings'));
    }

    public function home_user()
    {
        $users = $this->UserRepository->getAllUser();

        return view('admin.home_user', compact('users'));
    }

    public function home_vehicle()
    {
        $vehicles = $this->VehicleRepository->getAllVehicle();

        return view('admin.home_vehicle', compact('vehicles'));
    }

    public function edit_user($id)
    {
        $roles = $this->roles;
        $users = $this->UserRepository->getUser($id);

        return view('admin.edit_user', compact('users', 'roles'));
    }

    public function update_user(Request $request, $id)
    {
        $roles = $this->roles;
        $users = $this->UserRepository->getUser($id);
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
        $users = $this->UserRepository->getUser($request->get('user_id'));
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
        $vehicles = $this->VehicleRepository->createVehicle();
        $vehicles->name = $request->get('name');
        $vehicles->type_id = $request->get('type_id');
        $vehicles->brand_id = $request->get('brand_id');
        $vehicles->number_plate = $request->get('number_plate');
        $vehicles->color_id = $request->get('color_id');
        $vehicles->content = $request->get('content');
        $vehicles->ve_status_id = $request->get('ve_status_id');
        $vehicles->price = $request->get('price');
        $vehicles->status_id = $request->get('status_id');
        $images = $request->file('images');
        if ($vehicles->save()) {
            if ($images){
                foreach ($images as $image) {
                    $new_image = $this->VehicleRepository->createNewImage();
                    $extension = $image->getClientOriginalName();
                    $FileName = $extension . '_' . time();
                    $image->move('upload_image/', $FileName);
                    $new_image->path = $FileName;
                    $new_image->vehicle_id = $vehicles->id;
                    $new_image->save();
                }
            }
        }
        $mess = "";
        if ($vehicles->save()) {
            $mess = trans('messages.add message');
        }

        return redirect()->route('vehicleDetail', $vehicles->id)->with('mess', $mess);
    }

    public function edit_vehicle($id)
    {
        $types = $this->types;
        $brands = $this->brands;
        $colors = $this->colors;
        $ve_statuses = $this->ve_statuses;
        $statuses = $this->statuses;
        $vehicles = $this->VehicleRepository->getVehicle($id);

        return view('admin.edit_vehicle', compact('vehicles', 'types', 'brands', 'colors', 've_statuses', 'statuses'));
    }

    public function update_vehicle(Request $request, $id)
    {
        $vehicles = $this->VehicleRepository->getVehicle($id);
        $vehicles->name = $request->get('name');
        $vehicles->type_id = $request->get('type_id');
        $vehicles->brand_id = $request->get('brand_id');
        $vehicles->color_id = $request->get('color_id');
        $vehicles->ve_status_id = $request->get('ve_status_id');
        $vehicles->price = $request->get('price');
        $vehicles->status_id = $request->get('status_id');
        $images = $request->file('images');
        if ($vehicles->save()) {
            if ($images){
                foreach ($images as $image) {
                    $new_image = $this->VehicleRepository->createNewImage();
                    $extension = $image->getClientOriginalName();
                    $FileName = $extension . '_' . time();
                    $image->move('upload_image/', $FileName);
                    $new_image->path = $FileName;
                    $new_image->vehicle_id = $vehicles->id;
                    $new_image->save();
                }
            }
        }
        $mess = "";
        if ($vehicles->save()) {
            $mess = trans('messages.update message');
        }
        Session::flash('mess', $mess);

        return redirect()->route('vehicleDetail', $vehicles->id)->with('mess', $mess);
    }

    public function delete_vehicle(Request $request)
    {
        $vehicles = $this->VehicleRepository->getVehicle($request->get('vehicle_id'));
        $vehicles->delete();

        return redirect()->route('homeVehicle')->with('mess_del_vehicle', trans('messages.delete message'));
    }
}
