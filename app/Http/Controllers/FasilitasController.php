<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

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
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
            'nama' => 'required|string|max:35',
            'deskripsi' => 'required|string|max:100',
        ]);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::uuid() . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('fasilitas',$filename, 'public');

            $data = [
                "nama" => $request->nama,
                "deskripsi" => $request->deskripsi,
                "image" => $path
            ];
            Fasilitas::create($data);
            return redirect()->route('fasilitas.index')->with('success', 'Data Berhasil Ditambahkan');
        }
        return back()->with('error', 'Please select a valid image file.');
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
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB, gambar opsional
            'nama' => 'required|string|max:35',
            'deskripsi' => 'required|string|max:100',
        ]);

        // Mencari fasilitas berdasarkan ID
        $fasilitas = Fasilitas::findOrFail($id);

        // Jika ada file gambar yang diupload
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($fasilitas->image) {
                Storage::disk('public')->delete($fasilitas->image);
            }

            // Proses upload gambar baru
            $file = $request->file('image');
            $filename = Str::uuid() . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('fasilitas', $filename, 'public');

            // Update path gambar
            $fasilitas->image = $path;
        }

        // Update data lainnya
        $fasilitas->nama = $request->nama;
        $fasilitas->deskripsi = $request->deskripsi;

        // Simpan perubahan ke database
        $fasilitas->save();

        // Redirect dengan pesan sukses
        return redirect()->route('fasilitas.index')->with('success', 'Data Berhasil Diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $fasilitas = Fasilitas::findOrFail($id);

    if ($fasilitas->image) {
        Storage::disk('public')->delete($fasilitas->image);
    }

    $fasilitas->delete();

    return redirect()->route('fasilitas.index')->with('success', 'Data Berhasil Dihapus');
}

}
