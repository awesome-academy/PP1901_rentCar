<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\VehicleRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $VehicleRepository;

    public function __construct(
        VehicleRepositoryInterface $VehicleRepository
    )
    {
        $this->VehicleRepository = $VehicleRepository;
    }

    public function home()
    {
        $types = $this->VehicleRepository->getAllType();
        $vehicles = $this->VehicleRepository->getAllVehicle();
        foreach ($vehicles as $vehicle) {
            $images = $this->VehicleRepository->getOneImage($vehicle['id']);
            if ($images) {
                $vehicle['image'] = $images['path'];
            }
        }

        return view('welcome', compact('vehicles', 'types'));
    }

    public function ajax(Request $request)
    {
        $vehicles = $this->VehicleRepository->getType($request->get('id'))->vehicles()->with([
            'status' => function ($query) {
                $query->select(['statuses.id', 'statuses.name']);
            },

            've_status' => function ($query) {
                $query->select(['ve_statuses.id', 've_statuses.name']);
            }])->paginate(6);
        foreach ($vehicles as $vehicle) {
            $images = $this->VehicleRepository->getOneImage($vehicle['id']);
            if ($images) {
                $vehicle['image'] = $images['path'];
            }
        }

        return view('ajax', compact('vehicles'));
    }

    public function vehicle_detail($id)
    {
        $vehicles = $this->VehicleRepository->getDetailVehicle($id);
        $image = $this->VehicleRepository->getOneImage($id);

        return view('vehicle_detail', compact('vehicles', 'image'));
    }

    public function searchInfo(Request $request)
    {
        $vehicles = $this->VehicleRepository->getVehicleSearch($request);
        foreach ($vehicles as $vehicle) {
            $images = $this->VehicleRepository->getOneImage($vehicle['id']);
            if ($images) {
                $vehicle['image'] = $images['path'];
            }
        }

        return view('search', compact('vehicles'));
    }

    public function showChangePasswordForm(){

        return view('auth.changepassword');
    }

    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            $error =  trans('messages.error current password');

            return redirect()->back()->with("error", $error);
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            $error =  trans('messages.error password is same');

            return redirect()->back()->with("error", $error);
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        $success = trans('messages.change password success');

        return redirect()->back()->with("success", $success);
    }
}
