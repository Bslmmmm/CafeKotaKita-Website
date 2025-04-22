<?php

namespace App\Http\Controllers;

use App\Models\Kafe;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    
    public function index(Request $req)
    {
        $data = Menu::with('kafe')->get();
        return view('admin.menu.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kafe = Kafe::all();
        return view('admin.menu.form', compact('kafe'));
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
        Menu::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $data = Menu::find($id);
        return view('home');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Menu::findOrFail($id);
        return view('admin.menu.form', compact('data'));
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
        Menu::where('id', $id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Menu::destroy($id);
    }
}
