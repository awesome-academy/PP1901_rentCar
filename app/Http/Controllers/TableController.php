<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Repositories\VehicleRepositoryInterface;
use App\Repositories\UserRepositoryInterface;

class TableController extends Controller
{
    protected $VehicleRepository;
    protected $UserRepository;

    public function __construct(
        VehicleRepositoryInterface $VehicleRepository,
        UserRepositoryInterface $UserRepository
    )
    {
        $this->VehicleRepository = $VehicleRepository;
        $this->UserRepository = $UserRepository;
    }

    /*    Brand page*/

    public function home_brand()
    {
        $brands = $this->VehicleRepository->getBrandPaginate();

        return view('admin.table.home_brand', compact('brands'));
    }

    public function create_brand()
    {
        $brands = $this->VehicleRepository->getAllBrand();

        return view('admin.table.add_brand', compact('brands'));
    }

    public function store_brand(Request $request)
    {
        $brands = $this->VehicleRepository->createNewBrand();
        $brands->name = $request->get('name');
        $mess = "";
        if ($brands->save()) {
            $mess = trans('messages.add message');
        }

        return redirect()->route('editBrand', $brands->id)->with('mess', $mess);
    }

    public function edit_brand($id)
    {
        $brands = $this->VehicleRepository->getBrand($id);

        return view('admin.table.edit_brand', compact('brands'));
    }

    public function update_brand(Request $request, $id)
    {
        $brands = $this->VehicleRepository->getBrand($id);
        $brands->name = $request->get('name');
        $mess = "";
        if ($brands->save()) {
            $mess = trans('messages.update message');
        }
        Session::flash('mess', $mess);
        return view('admin.table.edit_brand', compact('brands'));
    }

    public function delete_brand(Request $request)
    {
        $brands = $this->VehicleRepository->getBrand($request->get('brand_id'));
        $brands->delete();

        return redirect()->route('homeBrand')->with('mess_del_brand', trans('messages.delete message'));
    }

    /*    Type page*/

    public function home_type()
    {
        $types = $this->VehicleRepository->getTypePaginate();

        return view('admin.table.home_type', compact('types'));
    }

    public function create_type()
    {
        $types = $this->VehicleRepository->getAllType();

        return view('admin.table.add_type', compact('types'));
    }

    public function store_type(Request $request)
    {
        $types = $this->VehicleRepository->createNewType();
        $types->name = $request->get('name');
        $mess = "";
        if ($types->save()) {
            $mess = trans('messages.add message');
        }

        return redirect()->route('editType', $types->id)->with('mess', $mess);
    }

    public function edit_type(Request $request, $id)
    {
        $types = $this->VehicleRepository->getType($id);

        return view('admin.table.edit_type', compact('types'));
    }

    public function update_type(Request $request, $id)
    {
        $types = $this->VehicleRepository->getType($id);
        $types->name = $request->get('name');
        $mess = "";
        if ($types->save()) {
            $mess = trans('messages.update message');
        }
        Session::flash('mess', $mess);

        return view('admin.table.edit_type', compact('types'));
    }

    public function delete_type(Request $request)
    {
        $types = $this->VehicleRepository->getType($request->get('type_id'));
        $types->delete();

        return redirect()->route('homeType')->with('mess_del_type', trans('messages.delete message'));
    }

    /*    Color page*/

    public function home_color()
    {
        $colors = $this->VehicleRepository->getColorPaginate();

        return view('admin.table.home_color', compact('colors'));
    }

    public function create_color()
    {
        $colors = $this->VehicleRepository->getAllColor();

        return view('admin.table.add_color', compact('colors'));
    }

    public function store_color(Request $request)
    {
        $colors = $this->VehicleRepository->createNewColor();
        $colors->name = $request->get('name');
        $mess = "";
        if ($colors->save()) {
            $mess = trans('messages.add message');
        }

        return redirect()->route('editColor', $colors->id)->with('mess', $mess);
    }

    public function edit_color($id)
    {
        $colors = $this->VehicleRepository->getColor($id);

        return view('admin.table.edit_color', compact('colors'));
    }

    public function update_color(Request $request, $id)
    {
        $colors = $this->VehicleRepository->getColor($id);
        $colors->name = $request->get('name');
        $mess = "";
        if ($colors->save()) {
            $mess = trans('messages.update message');
        }
        Session::flash('mess', $mess);

        return view('admin.table.edit_color', compact('colors'));
    }

    public function delete_color(Request $request)
    {
        $colors = $this->VehicleRepository->getColor($request->get('color_id'));
        $colors->delete();

        return redirect()->route('homeColor')->with('mess_del_color', trans('messages.delete message'));
    }

    /*    Vehicle status page*/

    public function home_ve_status()
    {
        $ve_statuses = $this->VehicleRepository->getVeStatusPaginate();

        return view('admin.table.home_ve_status', compact('ve_statuses'));
    }

    public function create_ve_status()
    {
        $ve_statuses = $this->VehicleRepository->getAllVeStatus();

        return view('admin.table.add_ve_status', compact('ve_statuses'));
    }

    public function store_ve_status(Request $request)
    {
        $ve_statuses = $this->VehicleRepository->createNewVeStatus();
        $ve_statuses->name = $request->get('name');
        $mess = "";
        if ($ve_statuses->save()) {
            $mess = trans('messages.add message');
        }

        return redirect()->route('editVe_status', $ve_statuses->id)->with('mess', $mess);
    }

    public function edit_ve_status($id)
    {
        $ve_statuses = $this->VehicleRepository->getVeStatus($id);

        return view('admin.table.edit_ve_status', compact('ve_statuses'));
    }

    public function update_ve_status(Request $request, $id)
    {
        $ve_statuses = $this->VehicleRepository->getVeStatus($id);
        $ve_statuses->name = $request->get('name');
        $mess = "";
        if ($ve_statuses->save()) {
            $mess = trans('messages.update message');
        }
        Session::flash('mess', $mess);

        return view('admin.table.edit_ve_status', compact('ve_statuses'));
    }

    public function delete_ve_status(Request $request)
    {
        $ve_statuses = $this->VehicleRepository->getVeStatus($request->get('ve_status_id'));
        $ve_statuses->delete();

        return redirect()->route('homeVe_status')->with('mess_del_ve_status', trans('messages.delete message'));
    }

    /*    Status page*/

    public function home_status()
    {
        $statuses = $this->VehicleRepository->getStatusPaginate();

        return view('admin.table.home_status', compact('statuses'));
    }

    public function create_status()
    {
        $statuses = $this->VehicleRepository->getAllStatus();

        return view('admin.table.add_status', compact('statuses'));
    }

    public function store_status(Request $request)
    {
        $statuses = $this->VehicleRepository->createNewStatus();
        $statuses->name = $request->get('name');
        $mess = "";
        if ($statuses->save()) {
            $mess = trans('messages.add message');
        }

        return redirect()->route('editStatus', $statuses->id)->with('mess', $mess);
    }

    public function edit_status($id)
    {
        $statuses = $this->VehicleRepository->getStatus($id);

        return view('admin.table.edit_status', compact('statuses'));
    }

    public function update_status(Request $request, $id)
    {
        $statuses = $this->VehicleRepository->getStatus($id);
        $statuses->name = $request->get('name');
        $mess = "";
        if ($statuses->save()) {
            $mess = trans('messages.update message');
        }
        Session::flash('mess', $mess);

        return view('admin.table.edit_status', compact('statuses'));
    }

    public function delete_status(Request $request)
    {
        $statuses = $this->VehicleRepository->getStatus($request->get('status_id'));
        $statuses->delete();

        return redirect()->route('homeStatus')->with('mess_del_status', trans('messages.delete message'));
    }

    /*    Role page*/

    public function home_role()
    {
        $roles = $this->UserRepository->getRolePaginate();

        return view('admin.table.home_role', compact('roles'));
    }

    public function create_role()
    {
        $roles = $this->UserRepository->getAllRole();

        return view('admin.table.add_role', compact('roles'));
    }

    public function store_role(Request $request)
    {
        $roles = $this->UserRepository->createNewRole();
        $roles->name = $request->get('name');
        $mess = "";
        if ($roles->save()) {
            $mess = trans('messages.add message');
        }

        return redirect()->route('editRole', $roles->id)->with('mess', $mess);
    }

    public function edit_role($id)
    {
        $roles = $this->UserRepository->getRole($id);

        return view('admin.table.edit_role', compact('roles'));
    }

    public function update_role(Request $request, $id)
    {
        $roles = $this->UserRepository->getRole($id);
        $roles->name = $request->get('name');
        $mess = "";
        if ($roles->save()) {
            $mess = trans('messages.update message');
        }
        Session::flash('mess', $mess);

        return view('admin.table.edit_role', compact('roles'));
    }

    public function delete_role(Request $request)
    {
        $roles = $this->UserRepository->getRole($request->get('role_id'));
        $roles->delete();

        return redirect()->route('homeRole')->with('mess_del_role', trans('messages.delete message'));
    }
}
