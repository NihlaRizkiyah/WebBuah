<?php

namespace App\Http\Controllers;

use App\Models\Restoran;
use App\Models\Tour;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if (!Auth::check()) {
            return redirect("login");
        }

        $restoran = Restoran::count();
        $wisata = Tour::count();
        $user = User::where("email", "!=", "admin@gmail.com")->count();
        return view("dashboard", compact("restoran", "wisata", "user"));
    }
}
