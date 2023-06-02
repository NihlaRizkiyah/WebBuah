<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    public function index(Request $request){
        $tipe = $request['t'];
        return view("favorite", compact('tipe'));
    }

    public function data(Request $request) {
        $id = $request['id'];
        $type = $request['tipe'];
        $type_lower = strtolower($type);
        $data = Favorite::with(["user", $type_lower])
            ->select("*", DB::raw("DATE_FORMAT(created_at, '%d/%m/%Y %H:%i:%s') as tanggal"))
            ->where("id_tipe", $id)
            ->where("tipe", $type)
            ->orderBy("created_at", "desc")
            ->get();
        return $data;
    }
}
