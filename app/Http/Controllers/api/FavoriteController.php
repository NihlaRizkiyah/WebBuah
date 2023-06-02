<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    public function indexWisata(Request $request)
    {
        $id_user = $request['id_user'];
        $data = DB::table("favorites")
            ->select('*', 'tours.id as id', DB::raw("'1' AS favorite"))
            ->join('tours', function ($join) {
                $join->on('favorites.id_tipe', '=', 'tours.id')
                    ->where('favorites.tipe', '=', 'wisata');
            })
            ->where('favorites.id_user', '=', $id_user)
            ->get();
        return $data;
    }

    public function indexRestoran(Request $request)
    {
        $id_user = $request['id_user'];
        $data = DB::table("favorites")
            ->select('*', 'restorans.id as id', DB::raw("'1' AS favorite"))
            ->join('restorans', function ($join) {
                $join->on('favorites.id_tipe', '=', 'restorans.id')
                    ->where('favorites.tipe', '=', 'restoran');
            })
            ->where('favorites.id_user', '=', $id_user)
            ->get();
        return $data;
    }

    public function add(Request $request){
        $id_user = $request['id_user'];
        $id_tipe = $request['id_tipe'];
        $tipe = $request['tipe'];
        $data = new Favorite();
        $data->id_user = $id_user;
        $data->id_tipe = $id_tipe;
        $data->tipe = $tipe;
        $data->save();

        return response()->json(["status" => "success", "message" => "Berhasil Simpan Ke Favorite"]);
    }


    public function remove(Request $request){
        $id_user = $request['id_user'];
        $id_tipe = $request['id_tipe'];
        $tipe = $request['tipe'];
        $data = Favorite::where("id_user", $id_user)->where("id_tipe", $id_tipe)->where("tipe", $tipe);
        $data->delete();

        return response()->json(["status" => "success", "message" => "Berhasil Hapus Favorite"]);
    }

}
