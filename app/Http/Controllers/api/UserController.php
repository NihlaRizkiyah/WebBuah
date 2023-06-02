<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->email;
        $pwd   = $request->password;

        if($email == "admin@gmail.com"){
            return Response()->json(["error" => true, "message" => "Email Atau Password Salah"]);
        }

        if (Auth::attempt(['email' => $email, 'password' => $pwd])) {
            $users = DB::table('users')
                ->select("*")
                ->where('email', $email)
                ->first();
            return Response()->json($users);
        } else {
            return Response()->json(["error" => true, "message" => "Email Atau Password Salah"]);
        }
    }

    public function register(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $nama = $request->nama;

        $check = User::where("email", $email)->get();

        if (count($check) >= 1) {
            return Response()->json(["error" => true, "message" => "Email Sudah Pernah Didaftarkan"]);
        }

        $insert = new User();
        $insert->name = $nama;
        $insert->email = $email;
        $insert->password = bcrypt($password);
        $insert->photo = "default.png";
        $insert->save();

        return response()->json(["status" => "success", "message" => "Berhasil", "data" => $insert]);
    }

    public function updateProfil(Request $request)
    {
        $id = $request->id;
        $email = $request->email;
        $nama = $request->nama;
        $check = User::where("email", $email)->where("id", "!=", $id)->get();

        if (count($check) >= 1) {
            return Response()->json(["error" => true, "message" => "Email Sudah Pernah Didaftarkan"]);
        }
        $imageName = "";

        if (request('image') != null) {
            $imageName = time() . '.' . request('image')->extension();
            request('image')->move(public_path('img/user'), $imageName);
            $update = DB::table('users')
            ->where("id", $id)
            ->update([
                'photo' => $imageName,
            ]);
        }

        $update = DB::table('users')
            ->where("id", $id)
            ->update([
                'email' => $email,
                'name' => $nama,
            ]);

        return response()->json(["status" => "success", "message" => "Berhasil", "data" => $imageName]);
    }

    public function updatePassword(Request $request)
    {
        $id = $request->id;
        $old = $request->old_password;
        $new = $request->new_password;

        $check = User::find($id);

        if (Auth::attempt(['email' => $check->email, 'password' => $old])) {
            $update = DB::table('users')
                ->where("id", $id)
                ->update([
                    'password' => bcrypt($new),
                ]);
            return response()->json(["status" => "success", "message" => "Berhasil"]);
        } else {
            return Response()->json(["error" => true, "message" => "Password Lama Salah"]);
        }
    }
}
