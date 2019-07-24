<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Type;
use App\Model\Vehicle;

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
        ])->paginate(6);
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
            }])->paginate(6);

        return view('ajax', compact('vehicles'));
    }

    public function vehicle_detail($id)
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
        ])->find($id);

        return view('vehicle_detail', compact('vehicles'));
    }

    public function searchInfo(Request $request)
    {
        $vehicles = Vehicle::where('name', 'like', '%' . $request->key . '%')
            ->orWhere('price', 'like', '%' . $request->key . '%')
            ->paginate(6)
            ->appends(request()->query());

        return view('search', compact('vehicles'));
    }
}
