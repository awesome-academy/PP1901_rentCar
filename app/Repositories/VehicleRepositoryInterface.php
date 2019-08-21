<?php

namespace App\Repositories;

interface VehicleRepositoryInterface
{
    public function getAllVehicle();

    public function getVehicle($id);

    public function getDetailVehicle($id);

    public function getVehicleSearch($request);

    public function createVehicle();

    public function getAllType();

    public function getTypePaginate();

    public function getType($id);

    public function createNewType();

    public function getAllBrand();

    public function getBrandPaginate();

    public function getBrand($id);

    public function createNewBrand();

    public function getAllColor();

    public function getColorPaginate();

    public function getColor($id);

    public function createNewColor();

    public function getAllVeStatus();

    public function getVeStatusPaginate();

    public function getVeStatus($id);

    public function createNewVeStatus();

    public function getAllStatus();

    public function getStatusPaginate();

    public function getStatus($id);

    public function createNewStatus();

    public function getAllRenting();

    public function getRentingWithUserID($id);

    public function getRentingWithVehicleID($id);

    public function insertRenting($data);
}
