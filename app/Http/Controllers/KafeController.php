<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Genre;
use App\Models\Kafe;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class KafeController extends Controller
{

    public function index(Request $req)
    {
        $data = Kafe::with("genre")->get();
        return view('admin.kafe.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genre = Genre::all();
        $fasilitas = Fasilitas::all();
        return view('admin.kafe.form', compact("genre", 'fasilitas'));
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

        $kafe_id = Kafe::create($data)->id;
        foreach($request->genre as $item)
        {
            DB::table('genre_kafe')->insert([
                "id" => Str::uuid(),
                "kafe_id" => $kafe_id,
                "genre_id" => $item
            ]);
        }
        foreach($request->fasilitas as $item)
        {
            DB::table('fasilitas_kafe')->insert([
                "id" => Str::uuid(),
                "kafe_id" => $kafe_id,
                "fasilitas_id" => $item
            ]);
        }
        return redirect()->route('kafe.index')->with('succes', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $data = Kafe::with(["fasilitas", "genre"])->findOrFail($id);
        return view('home');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Kafe::with(["fasilitas", "genre"])->findOrFail($id);
        $genre = Genre::all();
        $fasilitas = Fasilitas::all();
        return view('admin.kafe.form', compact('data', 'genre', 'fasilitas'));
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

    // Handle status from toggle switch
    $status = "tutup";
    if ($request->has('status')) {
        $status = "buka";
    }

    // Update kafe data
    $kafe = Kafe::findOrFail($id);
    $kafe->update([
        "nama" => $request->nama,
        "alamat" => $request->alamat,
        "telp" => $request->telp,
        "latitude" => $request->latitude,
        "longitude" => $request->longitude,
        "status" => $status
    ]);

    // Sync genres
    DB::table('genre_kafe')->where('kafe_id', $id)->delete();
    foreach($request->genre as $item) {
        DB::table('genre_kafe')->insert([
            "id" => Str::uuid(),
            "kafe_id" => $id,
            "genre_id" => $item
        ]);
    }

    // Sync facilities
    DB::table('fasilitas_kafe')->where('kafe_id', $id)->delete();
    foreach($request->fasilitas as $item) {
        DB::table('fasilitas_kafe')->insert([
            "id" => Str::uuid(),
            "kafe_id" => $id,
            "fasilitas_id" => $item
        ]);
    }

    return redirect()->route('kafe.index')->with('success', 'Data berhasil diperbarui!');
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
