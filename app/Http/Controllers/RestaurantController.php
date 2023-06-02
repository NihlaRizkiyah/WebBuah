<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Restoran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    public function index(){
        if (!Auth::check()) {
            return redirect("login");
        }
        $restoran = "active";
        return view("restoran", compact("restoran"));
    }

    public function data(){
        $restoran = Restoran::all();
        return $restoran;
    }

    public function detail(){
        if (!Auth::check()) {
            return redirect("login");
        }
        $restoran = "active";
        return view("detailRestoran", compact("restoran"));
    }

    public function datadetail(Request $request){
        $id = $request->id;
        $restoran = Restoran::find($id);
        $res = "";
        $fasilitas = json_decode($restoran->fasilitas);
        foreach($fasilitas as $fal){
            $t = Facility::find($fal);
            $res .= "<a class='btn btn-sm btn-success'>$t->nama</a> ";
        }
        $restoran->fasilitas = $res;

        return $restoran;
    }

    public function add(Request $request)
    {
        if (!Auth::check()) {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
        $nomorhp = $request['no_hp'];
        $deskripsi  = $request['deskripsi'];
        $nama = $request['nama'];
        $image = $request->file('gambar');
        $alamat = $request["alamat"];
        $fasilitas = $request["fasilitas"];
        $latlong = explode(";", $request["latlong"]);
        $lat = $latlong[0];
        $long = $latlong[1];
        $namafile = "default.png";
        if ($image) {
            $extention = $image->getClientOriginalExtension();
            $tujuan_upload = 'img/restoran/';
            $namafile = '' . date('Ymdhis') . '.' . $extention;
            $request->file('gambar')->move($tujuan_upload, $namafile);
        }
        $service = new Restoran();
        $service->no_hp = $nomorhp;
        $service->nama = $nama;
        $service->deskripsi = $deskripsi;
        $service->alamat = $alamat;
        $service->image = $namafile;
        $service->lat = $lat;
        $service->lng = $long;
        $service->fasilitas  = $fasilitas;
        $service->save();
        return response()->json(['success' => "Berhasil Submit"]);
    }

    public function edit(Request $request)
    {
        if (!Auth::check()) {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
        $nomorhp = $request['no_hp'];
        $id = $request['id'];
        $deskripsi  = $request['deskripsi'];
        $nama = $request['nama'];
        $image = $request->file('gambar');
        $alamat = $request["alamat"];
        $fasilitas = $request["fasilitas"];
        $latlong = explode(";", $request["latlong"]);
        $lat = $latlong[0];
        $long = $latlong[1];
        $namafile = "default.png";
        if ($image) {
            $extention = $image->getClientOriginalExtension();
            $tujuan_upload = 'img/restoran/';
            $namafile = '' . date('Ymdhis') . '.' . $extention;
            $request->file('gambar')->move($tujuan_upload, $namafile);
        }
        $service = Restoran::find($id);
        $service->no_hp = $nomorhp;
        $service->nama = $nama;
        $service->deskripsi = $deskripsi;
        $service->alamat = $alamat;
        if ($image) {
            $service->image = $namafile;
        }
        $service->lat = $lat;
        $service->lng = $long;
        $service->fasilitas  = $fasilitas;
        $service->save();
        return response()->json(['success' => "Berhasil Submit"]);
    }

    public function delete(Request $request)
    {
        if (!Auth::check()) {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
        $id = $request['id'];
        $service = Restoran::find($id);
        $service->delete();

        return response()->json(['success' => "Berhasil Delete"]);
    }
}
