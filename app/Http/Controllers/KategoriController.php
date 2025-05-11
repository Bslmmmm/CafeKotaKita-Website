<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(Request $req)
    {
        $data = Kategori::all();
        return view('admin.kategori.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nama" => "required|string|max:255"
        ]);
        Kategori::create([
            "nama" => $request->nama,
        ]);
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $data = Kategori::find($id);
        return view('admin.kategori.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Kategori::findOrFail($id);
        return view('admin.kategori.form', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "nama" => 'required|string|max:255'
        ]);
        Kategori::where('id', $id)->update([
            'nama' => $request->nama,
        ]);
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Kategori::destroy($id);
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
}
