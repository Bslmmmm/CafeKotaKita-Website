<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Kafe;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $req)
    {
        $data = Gallery::all();
        return view('admin.gallery.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kafe = Kafe::all();
        return view('admin.gallery.form', compact('kafe'));
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
        Gallery::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $data = Gallery::find($id);
        return view('home');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Gallery::findOrFail($id);
        return view('admin.gallery.form', compact('data'));
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
        Gallery::where('id', $id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Gallery::destroy($id);
    }
}
