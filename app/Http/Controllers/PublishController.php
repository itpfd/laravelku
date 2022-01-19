<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publish;

class PublishController extends Controller
{
    public function index()
    {
       $wifi=Wifi::all();
       $data=['wifi'=>$wifi];
       return $data;
    }

    public function create(request $request){
    $wifi = new Wifi;
    $wifi -> id_wifi = $request ->id_wifi;
    $wifi -> nama_wifi = $request ->nama_wifi;
    $wifi -> lokasi = $request ->lokasi;
    $wifi -> status = $request ->status;

    return "data berhasil masuk";
    }

    public function update(request $request, $id)
    {
        $nama_wifi = $request -> nama_wifi;
        $loaksi = $request -> lokasi;
        $status = $request -> status;
        
        $wifi = Wifi::find($id);
        $wifi->nama_wifi = $nama_wifi;
        $wifi->lokasi;
        $wifi->status;

        return "Data berhasil di update";

        
    }

}
