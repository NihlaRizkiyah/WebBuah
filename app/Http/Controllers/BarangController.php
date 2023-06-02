<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    public function index(){
        if (!Auth::check()) {
            return redirect("login");
        }
        $tour = "active";
        return view("barang", compact("tour"));
    }

    public function data(){
        $tour = Barang::all();
        return $tour;
    }

    public function detail(){
        if (!Auth::check()) {
            return redirect("login");
        }
        $tour = "active";
        return view("detailBarang", compact("tour"));
    }

    public function datadetail(Request $request){
        $id = $request->id;
        $barang = Barang::find($id);
        return $barang;
    }

    public function add(Request $request)
    {
        if (!Auth::check()) {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
        $nama = $request['nama'];
        $image = $request->file('gambar');
        $harga = $request["harga"];
        $stok = $request["stok"];
        $satuan = $request["satuan"];
        $namafile = "default.png";
        if ($image) {
            $extention = $image->getClientOriginalExtension();
            $tujuan_upload = 'img/barang/';
            $namafile = '' . date('Ymdhis') . '.' . $extention;
            $request->file('gambar')->move($tujuan_upload, $namafile);
        }
        $service = new Barang();
        $service->nama = $nama;
        $service->harga = $harga;
        $service->stok = $stok;
        $service->satuan = $satuan;
        $service->photo = $namafile;
        $service->save();
        return response()->json(['success' => "Berhasil Submit"]);
    }

    public function edit(Request $request)
    {
        if (!Auth::check()) {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    
        $id = $request['id'];
        $nama = $request['nama'];
        $image = $request->file('gambar');
        $harga = $request["harga"];
        $stok = $request["stok"];
        $satuan = $request["satuan"];
        $namafile = "default.png";
        if ($image) {
            $extention = $image->getClientOriginalExtension();
            $tujuan_upload = 'img/barang/';
            $namafile = '' . date('Ymdhis') . '.' . $extention;
            $request->file('gambar')->move($tujuan_upload, $namafile);
        }
        $service = Barang::find($id);
        $service->nama = $nama;
        $service->harga = $harga;
        $service->stok = $stok;
        $service->satuan = $satuan;
        if ($image) {
            $service->image = $namafile;
        }
        $service->save();
        return response()->json(['success' => "Berhasil Submit"]);
    }

    public function delete(Request $request)
    {
        if (!Auth::check()) {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
        $id = $request['id'];
        $service = Barang::find($id);
        $service->delete();

        return response()->json(['success' => "Berhasil Delete"]);
    }
}
