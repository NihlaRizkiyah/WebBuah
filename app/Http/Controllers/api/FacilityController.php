<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\Restoran;
use App\Models\Tour;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function data(){
        $data = Facility::all();
        return $data;
    }

    public function databywisata(Request $request){
        $id = $request->id;
        $wisata = Tour::find($id);
        $fasilitas = json_decode($wisata->fasilitas);
        $res = [];
        for($i=0;$i<count($fasilitas);$i++){
            $facility = Facility::find($fasilitas[$i]);
            $res[] =$facility->nama;
        }
        return $res;
    }

    public function databyrestoran(Request $request){
        $id = $request->id;
        $resto = Restoran::find($id);
        $fasilitas = json_decode($resto->fasilitas);
        $res = [];
        for($i=0;$i<count($fasilitas);$i++){
            $facility = Facility::find($fasilitas[$i]);
            $res[] =$facility->nama;
        }
        return $res;
    }
}
