<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Kafe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index(Request $req)
    {
        $data = Gallery::with('kafe')->get();
        return view('admin.gallery.index', compact('data'));
    }

    public function create()
    {
        $kafe = Kafe::all();
        return view('admin.gallery.form', compact('kafe'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kafe_id' => 'required|exists:kafe,id',
            'url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if($request->hasFile('url')) {
            $file = $request->file('url');
            $filename = Str::uuid() . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('galeri', $filename, 'public');

            Gallery::create([
                "kafe_id" => $request->kafe_id,
                "url" => $path
            ]);

            return redirect()->route('gallery.index')->with('success', 'Data Berhasil Ditambahkan');
        }

        return back()->with('error', 'Please select a valid image file.');
    }

    public function show($id)
    {
        $data = Gallery::find($id);
        return view('admin.gallery.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Gallery::findOrFail($id);
        $kafe = Kafe::all();
        return view('admin.gallery.form', compact('data', 'kafe'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kafe_id' => 'required|exists:kafe,id',
            'url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $galeri = Gallery::findOrFail($id);
        $galeri->kafe_id = $request->kafe_id;

        if ($request->hasFile('url')) {
            if ($galeri->url) {
                Storage::disk('public')->delete($galeri->url);
            }

            $file = $request->file('url');
            $filename = Str::uuid() . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('galeri', $filename, 'public');

            $galeri->url = $path;
        }

        $galeri->save();

        return redirect()->route('gallery.index')->with('success', 'Galeri berhasil diperbarui');
    }

    public function destroy($id)
    {
        $galeri = Gallery::findOrFail($id);

        if ($galeri->url) {
            Storage::disk('public')->delete($galeri->url);
        }

        $galeri->delete();

        return redirect()->route('gallery.index')->with('success', 'Data berhasil dihapus');
    }
}
