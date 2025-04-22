<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
       
    public function index(Request $req)
    {
        $data = Fasilitas::all();
        return view('admin.fasilitas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.fasilitas.form');
    }   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            "nama" => "Kafe Kita",
            "alamat" => "Jl. Raya Kita No. 1",
            "telp" => "08123456789",
            "latitude" => "-6.123456",
            "longitude" => "106.123456",
            "status" => "buka"
        ];
        Fasilitas::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $data = Fasilitas::find($id);
        return view('home');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Fasilitas::findOrFail($id);
        return view('admin.fasilitas.form', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = [
            "nama" => "Kafe Kita",
            "alamat" => "Jl. Raya Kita No. 1",
            "telp" => "08123456789",
            "latitude" => "-6.123456",
            "longitude" => "106.123456",
            "status" => "tutup"
        ];
        Fasilitas::where('id', $id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Fasilitas::destroy($id);
    }
}
