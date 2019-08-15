<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepositoryInterface;

class ProfileController extends Controller
{
    protected $UserRepository;

    public function __construct(UserRepositoryInterface $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }

    public function edit($id)
    {
        $users = $this->UserRepository->getUser($id);

        return view('user_profile', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $users = $this->UserRepository->getUser($id);
        $users->name = $request->get('name');
        $users->birthday = $request->get('birthday');
        $users->email = $request->get('email');
        $users->address = $request->get('address');
        $users->phone = $request->get('phone');
        $users->card_id = $request->get('card_id');
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'address' => 'required|string|min:6',
            'phone' => 'required|numeric|min:10',
            'card_id' => 'required|numeric|min:9',
            'birthday' => 'required|date',
        ]);
        $mess = "";
        if ($users->save()) {
            $mess = trans('messages.update message');
        }

        return view('user_profile', compact('users'))->with('mess', $mess);
    }
}
