<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wifi;
use Illuminate\Support\Str;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $wifi = Wifi::orderBy('id_wifi','desc')->get();
        return view('post.index', compact('wifi'));
        //return view('home');
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_wifi' => 'required|string|max:155',
            'lokasi' => 'required',
            'status' => 'required'
        ]);

        $wifi = Wifi::create([
            'id_wifi' => $request->id_wifi,
            'nama_wifi' => $request->nama_wifi,
            'lokasi' => $request->lokasi,
            'status' => $request->status
        ]);

        if ($wifi) {
            return redirect()
                ->route('post.index')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
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
