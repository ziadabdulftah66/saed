<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {

        return view('dashboard.auth.login');
    }


    public function postLogin(AdminLoginRequest $request)
    {

        //validation

        //check , store , update

        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            return redirect()->route('admin_dashboard');
        }
        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);

    }
    public function logout(){
        $guard=$this->getguard();
        $guard->logout();
        return redirect()->route('login.admin');
    }
    private function getguard(){
        return auth('admin');
    }

}
