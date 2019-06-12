<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Vehicle;
use App\Model\Renting;
use App\Model\User;

class AdminController extends Controller
{
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

    public function edit_user($id){
        $users = User::find($id);
        return view('admin.edit_user',compact('users'));
    }

    public function update_user(Request $request,$id){
        $users = User::find($id);
        $users->name = $request->get('name');
        $users->birthday = $request->get('birthday');
        $users-> email = $request->get('email');
        $users->address = $request->get('address');
        $users->phone = $request->get('phone');
        $users->card_id = $request->get('card_id');
        $users->role_id = $request->get('role_id');
        $mess = "";
        if ($users->save()){
            $mess = trans('messages.update message');
        }

        return view('admin.edit_user', compact('users')) -> with('mess', $mess);
    }

    public function delete_user(Request $request){
        $users = User::find($request->get('user_id'));
        $users->delete();

        return redirect('/admin/user')->with('mess_del', 'Delete user success!');
    }
}
