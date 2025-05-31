<?php

namespace App\Http\Controllers;

use App\Models\Kafe;
use App\Models\Kategori;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
class MenuController extends Controller
{
    public function index()
    {
        $data = Menu::with(['kafe', 'kategori'])->get();
        return view('admin.menu.index', compact('data'));
    }

    public function create()
    {
        $kafe = Kafe::all();
        $kategori = Kategori::all();
        return view('admin.menu.form', compact('kafe', 'kategori'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required|string|max:35',
            'kafe_id' => 'required|string|max:100',
            'harga' => 'required|string|max:100',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
        ]);
        

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::uuid() . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('menu', $filename, 'public');
        }
        $status = $request->status == "on" ? "tersedia" : "habis";
        $data = [
            "kafe_id" => $request->kafe_id,
            "nama" => $request->nama,
            "harga" => $request->harga,
            "image" => $path,
            "status" => $status,
        ];
        $menu_id = Menu::create($data)->id;
        foreach ($request->kategori as $item) {
            DB::table('menu_kategori')->insert([
                "id" => Str::uuid(),
                "menu_id" => $menu_id,
                "kategori_id" => $item
            ]);
        } 
        return redirect()->route('menu.index')->with('success', 'Data Berhasil Ditambahkan');
        return back()->with('error', 'Please select a valid image file.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Menu::with('kafe')->findOrFail($id);
        return view('admin.menu.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Menu::with(["kategori"])->findOrFail($id);
        $kafe = Kafe::all();
        $kategori = Kategori::all();
        return view('admin.menu.form', compact('data', 'kafe', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:35',
            'kafe_id' => 'required|string|max:100',
            'harga' => 'required|string|max:100',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
        ]);
        $path = "";
        // Mencari fasilitas berdasarkan ID
        $menu = Menu::findOrFail($id);
        // Jika ada file gambar yang diupload
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($menu->image && Storage::disk('public')->exists($menu->image)) {
                Storage::disk('public')->delete($menu->image);
            }

            // Process new image upload
            $file = $request->file('image');
            $filename = Str::uuid() . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('menu', $filename, 'public');
        } else {
            // Keep the existing image if no new image was uploaded
            $path = $menu->image;
        }
        $status = $request->status == "on" ? "tersedia" : "habis";

        $data = [
            "kafe_id" => $request->kafe_id,
            "nama" => $request->nama,
            "harga" => $request->harga,
            "image" => $path,
            "status" => $status,
        ];
        $menu->update($data);

       
        // Simpan perubahan ke database
        DB::table('menu_kategori')->where('menu_id', $id)->delete();
        foreach ($request->kategori as $item) {
            DB::table('menu_kategori')->insert([
                "id" => Str::uuid(),
                "menu_id" => $id,
                "kategori_id" => $item
            ]);
        }

        // Redirect dengan pesan sukses
        return redirect()->route('menu.index')->with('success', 'Data Berhasil Diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

      
        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Data Berhasil Dihapus');
    }
}
