<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect("login");
        }
        $user = "active";
        return view("dataUser", compact("user"));
    }

    public function data()
    {
        $user = User::all();
        return $user;
    }

    public function detail()
    {
        if (!Auth::check()) {
            return redirect("login");
        }
        $user = "active";
        return view("detailUser", compact("user"));
    }

    public function datadetail(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        return $user;
    }

    public function profil()
    {
        if (Auth::check()) {
            $profil = "active";
            return view('profil', compact('profil'));
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function dataprofil()
    {
        $id = Auth::id();
        if (Auth::check()) {
            $user = User::where('id', $id)->get()->toArray();
            return $user;
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function updatepassword(Request $request)
    {
        $old_password = $request['old_password'];
        $new_password = $request['new_password'];

        $user = User::findOrFail(Auth::id());

        if (Hash::check($old_password, $user->password)) {
            $user->fill([
                'password' => Hash::make($new_password)
            ])->save();
            return response()->json(['status' => "success", 'message' => "Berhasil ubah password"]);
        } else {
            return response()->json(['status' => "error", 'message' => "Password Lama Salah"]);
        }
    }
}
