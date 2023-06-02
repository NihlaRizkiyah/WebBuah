<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TourController extends Controller
{
    public function data(Request $request)
    {
        $id = $request["id"];
        $kategori = $request['kategori'];
        $tipe = "wisata";
        if($kategori == ""){
            $data = DB::table('tours')
            ->leftJoin('favorites', function ($join) use ($id, $tipe) {
                $join->on("favorites.id_tipe", "=", "tours.id")
                    ->where("favorites.tipe", "=", $tipe)
                    ->where("favorites.id_user", "=", $id);
            })
            ->select('tours.*', DB::raw('(CASE WHEN favorites.id IS NULL THEN false ELSE true END) AS favorite'))
            ->get();

            return $data;
        }

        $data = DB::table('tours')
            ->leftJoin('favorites', function ($join) use ($id, $tipe) {
                $join->on("favorites.id_tipe", "=", "tours.id")
                    ->where("favorites.tipe", "=", $tipe)
                    ->where("favorites.id_user", "=", $id);
            })
            ->where("tours.kategori", $kategori)
            ->select('tours.*', DB::raw('(CASE WHEN favorites.id IS NULL THEN false ELSE true END) AS favorite'))
            ->get();
        

        return $data;
    }

    public function populer(Request $request)
    {
        $id = $request["id"];
        $tipe = "wisata";

        $totalfav = DB::table('favorites')
            ->select('id_tipe as id', DB::raw('COUNT(id) AS jumlah'))
            ->where("tipe", "=", $tipe)
            ->groupBy('id_tipe');

        $data = DB::table('tours')
            ->leftJoin('favorites as fav', function ($join) use ($id, $tipe) {
                $join->on("fav.id_tipe", "=", "tours.id")
                    ->where("fav.tipe", "=", $tipe)
                    ->where("fav.id_user", "=", $id);
            })
            ->leftJoinSub($totalfav, 'S', function ($join) {
                $join->on('S.id', "=" ,'tours.id');
            })
            ->select(
                'tours.*',
                DB::raw('(CASE WHEN fav.id IS NULL THEN false ELSE true END) AS favorite'),
                DB::raw('COALESCE(S.jumlah, 0) AS total_favorite')
            )
            ->orderBy("total_favorite", "desc")
            ->limit(3)
            ->get();

        return $data;
    }
}
