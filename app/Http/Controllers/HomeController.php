<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\VehicleRepositoryInterface;

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

        return view('ajax', compact('vehicles'));
    }

    public function vehicle_detail($id)
    {
        $vehicles = $this->VehicleRepository->getDetailVehicle($id);

        return view('vehicle_detail', compact('vehicles'));
    }

    public function searchInfo(Request $request)
    {
        $vehicles = $this->VehicleRepository->getVehicleSearch($request);

        return view('search', compact('vehicles'));
    }
}
