<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {

        return view('users.auth.login');

    }
    public function postLogin(UserLoginRequest $request)
    {

        //validation

        //check , store , update

        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('web')->attempt(['phone' => $request->input("phone"), 'password' => $request->input("password")], $remember_me)) {
            return redirect()->route('user_dashboard');
        }
        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);

    }
}
