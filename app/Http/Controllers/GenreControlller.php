<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreControlller extends Controller
{
    public function index()
    {
        $data = Genre::all();
        return view('admin.genre.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.genre.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nama" => "required|string|max:255",
        ]);

        Genre::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('genre.index')->with('success', 'Genre berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Genre::findOrFail($id);
        return view('admin.genre.show', compact('data')); // optional
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Genre::findOrFail($id);
        return view('admin.genre.form', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "nama" => "required|string|max:255",
        ]);

        Genre::where('id', $id)->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('genre.index')->with('success', 'Genre berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Genre::destroy($id);
        return redirect()->route('genre.index')->with('success', 'Genre berhasil dihapus');
    }
}
