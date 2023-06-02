<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestaurantController extends Controller
{
    public function data(Request $request)
    {
        $id = $request["id"];
        $tipe = "restoran";
        $data = DB::table('restorans')
            ->leftJoin('favorites', function ($join) use ($id, $tipe) {
                $join->on("favorites.id_tipe", "=", "restorans.id")
                    ->where("favorites.tipe", "=", $tipe)
                    ->where("favorites.id_user", "=", $id);
            })
            ->select('restorans.*', DB::raw('(CASE WHEN favorites.id IS NULL THEN false ELSE true END) AS favorite'))
            ->get();

        return $data;
    }

    public function populer(Request $request)
    {
        $id = $request["id"];
        $tipe = "restoran";

        $totalfav = DB::table('favorites')
            ->select('id_tipe as id', DB::raw('COUNT(id) AS jumlah'))
            ->where("tipe", "=", $tipe)
            ->groupBy('id_tipe');

        $data = DB::table('restorans')
            ->leftJoin('favorites as fav', function ($join) use ($id, $tipe) {
                $join->on("fav.id_tipe", "=", "restorans.id")
                    ->where("fav.tipe", "=", $tipe)
                    ->where("fav.id_user", "=", $id);
            })
            ->leftJoinSub($totalfav, 'S', function ($join) {
                $join->on('S.id', "=" ,'restorans.id');
            })
            ->select(
                'restorans.*',
                DB::raw('(CASE WHEN fav.id IS NULL THEN false ELSE true END) AS favorite'),
                DB::raw('COALESCE(S.jumlah, 0) AS total_favorite')
            )
            ->orderBy("total_favorite", "desc")
            ->limit(3)
            ->get();

        return $data;
    }
}
