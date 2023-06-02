<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TourController extends Controller
{
    public function index(){
        if (!Auth::check()) {
            return redirect("login");
        }
        $tour = "active";
        return view("wisata", compact("tour"));
    }

    public function data(){
        $tour = Tour::all();
        return $tour;
    }

    public function detail(){
        if (!Auth::check()) {
            return redirect("login");
        }
        $tour = "active";
        return view("detailWisata", compact("tour"));
    }

    public function datadetail(Request $request){
        $id = $request->id;
        $tour = Tour::find($id);
        $res = "";
        $fasilitas = json_decode($tour->fasilitas);
        foreach($fasilitas as $fal){
            $t = Facility::find($fal);
            $res .= "<a class='btn btn-sm btn-success'>$t->nama</a> ";
        }
        $tour->fasilitas = $res;

        return $tour;
    }

    public function add(Request $request)
    {
        if (!Auth::check()) {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
        $kategori = $request['kategori'];
        $deskripsi  = $request['deskripsi'];
        $nama = $request['nama'];
        $image = $request->file('gambar');
        $alamat = $request["alamat"];
        $fasilitas = $request["fasilitas"];
        $tiket = $request["tiket"];
        $latlong = explode(";", $request["latlong"]);
        $lat = $latlong[0];
        $long = $latlong[1];
        $namafile = "default.png";
        if ($image) {
            $extention = $image->getClientOriginalExtension();
            $tujuan_upload = 'img/wisata/';
            $namafile = '' . date('Ymdhis') . '.' . $extention;
            $request->file('gambar')->move($tujuan_upload, $namafile);
        }
        $service = new Tour();
        $service->kategori = $kategori;
        $service->nama = $nama;
        $service->deskripsi = $deskripsi;
        $service->alamat = $alamat;
        $service->image = $namafile;
        $service->tiket_masuk = $tiket;
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
        $kategori = $request['kategori'];
        $id = $request['id'];
        $deskripsi  = $request['deskripsi'];
        $nama = $request['nama'];
        $image = $request->file('gambar');
        $alamat = $request["alamat"];
        $fasilitas = $request["fasilitas"];
        $tiket = $request["tiket"];
        $latlong = explode(";", $request["latlong"]);
        $lat = $latlong[0];
        $long = $latlong[1];
        $namafile = "default.png";
        if ($image) {
            $extention = $image->getClientOriginalExtension();
            $tujuan_upload = 'img/wisata/';
            $namafile = '' . date('Ymdhis') . '.' . $extention;
            $request->file('gambar')->move($tujuan_upload, $namafile);
        }
        $service = Tour::find($id);
        $service->kategori = $kategori;
        $service->nama = $nama;
        $service->deskripsi = $deskripsi;
        $service->alamat = $alamat;
        if ($image) {
            $service->image = $namafile;
        }
        $service->tiket_masuk = $tiket;
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
        $service = Tour::find($id);
        $service->delete();

        return response()->json(['success' => "Berhasil Delete"]);
    }

}
