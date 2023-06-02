<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $id_tipe = $request['id_tipe'];
        $tipe = $request['tipe'];
        $data = DB::table("comments")
            ->select("*", "comments.id as id", DB::raw("DATE_FORMAT(comments.created_at, '%d-%m-%Y %H:%i:%s') as tanggal"))
            ->join("users", "users.id", "=", "comments.id_user")
            ->where("tipe", $tipe)
            ->where("id_tipe", $id_tipe)
            ->get();
        return $data;
    }

    public function add(Request $request)
    {
        $id_user = $request['id_user'];
        $id_tipe = $request['id_tipe'];
        $tipe = $request['tipe'];
        $komentar = $request['komentar'];
        $data = new Comment();
        $data->id_user = $id_user;
        $data->id_tipe = $id_tipe;
        $data->tipe = $tipe;
        $data->komentar = $komentar;
        $data->save();

        return response()->json(["status" => "success", "message" => "Berhasil Simpan Ke Favorite"]);
    }


    public function remove(Request $request)
    {
        $id= $request['id'];
        $data = Comment::find($id);
        $data->delete();

        return response()->json(["status" => "success", "message" => "Berhasil Hapus Favorite"]);
    }
}
