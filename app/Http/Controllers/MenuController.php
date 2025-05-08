<?php

namespace App\Http\Controllers;

use App\Models\Kafe;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $data = Menu::with('kafe')->get();
        return view('admin.menu.index', compact('data'));
    }

    public function create()
    {
        $kafe = Kafe::all();
        return view('admin.menu.form', compact('kafe'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|integer',
            'status' => 'required|in:tersedia,tidak tersedia',
            'kafe_id' => 'required|exists:kafe,id',
        ]);

        Menu::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'status' => $request->status,
            'kafe_id' => $request->kafe_id,
        ]);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan.');
    }

    public function show($id)
    {
        $data = Menu::with('kafe')->findOrFail($id);
        return view('admin.menu.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Menu::findOrFail($id);
        $kafe = Kafe::all();
        return view('admin.menu.form', compact('data', 'kafe'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|integer',
            'status' => 'required|in:tersedia,tidak tersedia',
            'kafe_id' => 'required|exists:kafe,id',
        ]);

        Menu::where('id', $id)->update([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'status' => $request->status,
            'kafe_id' => $request->kafe_id,
        ]);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Menu::destroy($id);
        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus.');
    }
}
