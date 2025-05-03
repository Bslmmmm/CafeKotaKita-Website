<?php

namespace App\Http\Controllers;

use App\Models\Kafe;
use Illuminate\Http\Request;

class KafeController extends Controller
{

    public function index(Request $req)
    {
        $data = Kafe::all();
        return view('admin.kafe.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kafe.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telp' => 'required|string|max:15',
            'latitude' => 'required|string|max:255',
            'longitude' => 'required|string|max:255',
        ]);

        // Handle status dari toggle switch
        $status = "tutup";
        if ($request->has('status')) {
            $status = "buka";
        }

        $data = [
            "nama" => $request->nama,
            "alamat" => $request->alamat,
            "telp" => $request->telp,
            "latitude" => $request->latitude,
            "longitude" => $request->longitude,
            "status" => $status
        ];

        Kafe::create($data);

        return redirect()->route('kafe.index')->with('succes', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $data = Kafe::find($id);
        return view('home');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Kafe::findOrFail($id);
        return view('admin.kafe.form', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telp' => 'required|string|max:15',
            'latitude' => 'required|string|max:255',
            'longitude' => 'required|string|max:255',
        ]);
        // Handle status dari toggle switch
        $status = "tutup"; // Default status
        if ($request->has('status')) {
            $status = "buka";
        }

        $data = [
            "nama" => $request->nama,
            "alamat" => $request->alamat,
            "telp" => $request->telp,
            "latitude" => $request->latitude,
            "longitude" => $request->longitude,
            "status" => $status
        ];

        $kafe = Kafe::findOrFail($id);
        $kafe->update($data);

        return redirect()->route('kafe.index')->with('succes', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kafe = Kafe::findOrFail($id);
        $kafe->delete();

        return redirect()->route('kafe.index')->with('success', 'Data berhasil diihapus!');
    }
}
