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

    public function create()
    {
        $genre = Genre::all();
        $fasilitas = Fasilitas::all();
        $data = null;
        return view('admin.kafe.form', compact("genre", 'fasilitas', 'data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telp' => 'required|string|max:15',
            'latitude' => 'required|string|max:255',
            'longitude' => 'required|string|max:255',
            'jam_buka' => 'required|date_format:H:i',
            'jam_tutup' => 'required|date_format:H:i',
        ]);

        $data = [
            "nama" => $request->nama,
            "alamat" => $request->alamat,
            "telp" => $request->telp,
            "latitude" => $request->latitude,
            "longitude" => $request->longitude,
            "jam_buka" => $request->jam_buka,
            "jam_tutup" => $request->jam_tutup
        ];

        $kafe_id = Kafe::create($data)->id;
        if ($request->has('genre')) {

            foreach ($request->genre as $item) {
                DB::table('genre_kafe')->insert([
                    "id" => Str::uuid(),
                    "kafe_id" => $kafe_id,
                    "genre_id" => $item
                ]);
            }
        }
        if ($request->has('fasilitas')) {

            foreach ($request->fasilitas as $item) {
                DB::table('fasilitas_kafe')->insert([
                    "id" => Str::uuid(),
                    "kafe_id" => $kafe_id,
                    "fasilitas_id" => $item
                ]);
            }
        }

        return redirect()->route('kafe.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show($id)
    {
        $data = Kafe::with(["fasilitas", "genre"])->findOrFail($id);
        return view('home');
    }

    public function edit($id)
    {
        $data = Kafe::with(["fasilitas", "genre"])->findOrFail($id);
        $genre = Genre::all();
        $fasilitas = Fasilitas::all();
        return view('admin.kafe.form', compact('data', 'genre', 'fasilitas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telp' => 'required|string|max:15',
            'latitude' => 'required|string|max:255',
            'longitude' => 'required|string|max:255',
            'jam_buka' => 'required|date_format:H:i',
            'jam_tutup' => 'required|date_format:H:i',
        ]);

        $kafe = Kafe::findOrFail($id);
        $kafe->update([
            "nama" => $request->nama,
            "alamat" => $request->alamat,
            "telp" => $request->telp,
            "latitude" => $request->latitude,
            "longitude" => $request->longitude,
            "jam_buka" => $request->jam_buka,
            "jam_tutup" => $request->jam_tutup
        ]);

        DB::table('genre_kafe')->where('kafe_id', $id)->delete();
        if ($request->has('genre')) {
            foreach ($request->genre as $item) {
                DB::table('genre_kafe')->insert([
                    "id" => Str::uuid(),
                    "kafe_id" => $id,
                    "genre_id" => $item
                ]);
            }
        }

        // Sync facilities
        DB::table('fasilitas_kafe')->where('kafe_id', $id)->delete();
        if ($request->has('fasilitas')) {

            foreach ($request->fasilitas as $item) {
            DB::table('fasilitas_kafe')->insert([
                "id" => Str::uuid(),
                "kafe_id" => $id,
                "fasilitas_id" => $item
            ]);
        }
    }
        return redirect()->route('kafe.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kafe = Kafe::findOrFail($id);
        DB::table('genre_kafe')->where('kafe_id', $id)->delete();

        DB::table('fasilitas_kafe')->where('kafe_id', $id)->delete();

        $kafe->delete();

        return redirect()->route('kafe.index')->with('success', 'Data berhasil dihapus!');
    }
}
