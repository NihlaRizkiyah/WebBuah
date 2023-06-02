<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        if (Auth::check()) {
            return redirect("dashboard");
        }
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $email = $request->email;
        $pwd   = $request->password;

        if($email != "admin@gmail.com"){
            return redirect("login")->withErrors('Akun Tidak Ditemukan');
        }

        $remember = true;
        if (
            Auth::attempt(['email' => $email, 'password' => $pwd], $remember)
        ) {
            $user = Auth::getLastAttempted();
            return redirect()->intended('dashboard')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withErrors('Akun Tidak Ditemukan');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
