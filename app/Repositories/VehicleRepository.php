<?php

namespace App\Repositories;

use App\Model\Brand;
use App\Model\Color;
use App\Model\Renting;
use App\Model\Status;
use App\Model\Type;
use App\Model\Ve_status;
use App\Model\Vehicle;

class VehicleRepository implements VehicleRepositoryInterface
{
    /* Vehicle */
    public function getAllVehicle()
    {
        $vehicles = Vehicle::with([
            'type' => function ($query) {
                $query->select(['types.id', 'types.name']);
            },

            'brand' => function ($query) {
                $query->select(['brands.id', 'brands.name']);
            },

            'color' => function ($query) {
                $query->select(['colors.id', 'colors.name']);
            },

            've_status' => function ($query) {
                $query->select(['ve_statuses.id', 've_statuses.name']);
            },

            'status' => function ($query) {
                $query->select(['statuses.id', 'statuses.name']);
            }
        ])->paginate(6);

        return $vehicles;
    }

    public function getVehicle($id)
    {
        $vehicles = Vehicle::find($id);

        return $vehicles;
    }

    public function getDetailVehicle($id)
    {
        $vehicles = Vehicle::with([
            'type' => function ($query) {
                $query->select(['types.id', 'types.name']);
            },

            'brand' => function ($query) {
                $query->select(['brands.id', 'brands.name']);
            },

            'color' => function ($query) {
                $query->select(['colors.id', 'colors.name']);
            },

            've_status' => function ($query) {
                $query->select(['ve_statuses.id', 've_statuses.name']);
            },

            'status' => function ($query) {
                $query->select(['statuses.id', 'statuses.name']);
            }
        ])->find($id)->toArray();

        return $vehicles;
    }

    public function getVehicleSearch($request)
    {
        $vehicles = Vehicle::where('name', 'like', '%' . $request->key . '%')
            ->orWhere('price', 'like', '%' . $request->key . '%')
            ->paginate(6)
            ->appends(request()->query());

        return $vehicles;
    }

    public function createVehicle()
    {
        $vehicles = new Vehicle();

        return $vehicles;
    }

    /* Brand */
    public function getAllBrand()
    {
        $brands = Brand::all();

        return $brands;
    }

    public function getBrandPaginate()
    {
        $brands = Brand::paginate(5);

        return $brands;
    }

    public function getBrand($id)
    {
        $brands = Brand::find($id);

        return $brands;
    }

    public function createNewBrand()
    {
        $brands = new Brand();

        return $brands;
    }

    /* Type */

    public function getAllType()
    {
        $types = Type::all();

        return $types;
    }

    public function getTypePaginate()
    {
        $types = Type::paginate(5);

        return $types;
    }

    public function getType($id)
    {
        $types = Type::find($id);

        return $types;
    }

    public function createNewType()
    {
        $types = new Type();

        return $types;
    }

    /* Color */

    public function getAllColor()
    {
        $colors = Color::all();

        return $colors;
    }

    public function getColorPaginate()
    {
        $colors = Color::paginate(5);

        return $colors;
    }

    public function getColor($id)
    {
        $colors = Color::find($id);

        return $colors;
    }

    public function createNewColor()
    {
        $colors = new Color();

        return $colors;
    }

    /* Vehicle Status */

    public function getAllVeStatus()
    {
        $ve_statuses = Ve_status::all();

        return $ve_statuses;
    }

    public function getVeStatusPaginate()
    {
        $ve_statuses = Ve_status::paginate(5);

        return $ve_statuses;
    }

    public function getVeStatus($id)
    {
        $ve_statuses = Ve_status::find($id);

        return $ve_statuses;
    }

    public function createNewVeStatus()
    {
        $ve_statuses = new Ve_status();

        return $ve_statuses;
    }

    /* Status */

    public function getAllStatus()
    {
        $statuses = Status::all();

        return $statuses;
    }

    public function getStatusPaginate()
    {
        $statuses = Status::paginate(5);

        return $statuses;
    }

    public function getStatus($id)
    {
        $statuses = Status::find($id);

        return $statuses;
    }

    public function createNewStatus()
    {
        $statuses = new Status();

        return $statuses;
    }

    /* Renting */

    public function getAllRenting()
    {
        $rentings = renting::with([
            'user' => function ($query) {
                $query->select(['users.id', 'users.name']);
            },
            'vehicle' => function ($query) {
                $query->select(['vehicles.id', 'vehicles.name']);
            }
        ])->paginate(8);

        return $rentings;
    }

    public function getRentingWithUserID($id)
    {
        $rentings = Renting::where('user_id', '=', $id)->with([
            'user' => function ($query) {
                $query->select(['users.id', 'users.name']);
            },
            'vehicle' => function ($query) {
                $query->select(['vehicles.id', 'vehicles.name']);
            }
        ])->paginate(8);

        return $rentings;
    }

    public function getRentingWithVehicleID($id)
    {
        $rentings = Renting::where('vehicle_id', '=', $id)->get()->toArray();

        return $rentings;
    }

    public function insertRenting($data)
    {
        Renting::insert($data);
    }
}
