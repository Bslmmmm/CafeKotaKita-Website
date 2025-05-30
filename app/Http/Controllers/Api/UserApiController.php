<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserApiController extends Controller
{

    public function searchById($id)
    {
        try {
            $data = User::find($id);

            if (empty($data)) {
                return response()->json([
                    "status" => "error",
                    "message" => "Menu tidak ditemukan dengan ID: " . $id,
                    "data" => null
                ], 404);
            }

            return response()->json([
                "status" => "success",
                "message" => "Berhasil mengambil data",
                "data" => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => "Gagal mengambil data Menu: " . $e->getMessage()
            ], 500);
        }
    }
 public function update(Request $request, $id)
{
    try {
        // Validasi input termasuk no_telp dan foto_profil
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'no_telp' => 'nullable|string|max:20',
            'foto_profil' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        // Cari user
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User tidak ditemukan'
            ], 404);
        }

        // Update nama
        if ($request->has('nama')) {
            $user->nama = $request->nama;
        }

        // Update no_telp
        if ($request->has('no_telp')) {
            $user->no_telp = $request->no_telp;
        }

        // Handle foto profil
        if ($request->hasFile('foto_profil')) {
            // Hapus foto lama jika ada
            if ($user->foto_profil) {
                Storage::disk('public')->delete('profiles/' . $user->foto_profil);
            }

            // Simpan foto baru
            $file = $request->file('foto_profil');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('profiles', $filename, 'public');

            // Simpan nama file ke DB
            $user->foto_profil = $filename;
        }

        $user->save();

        // Kembalikan respons JSON
        return response()->json([
            'status' => 'success',
            'message' => 'Profil berhasil diperbarui',
            'data' => [
                'id' => $user->id,
                'nama' => $user->nama,
                'email' => $user->email,
                'no_telp' => $user->no_telp,
                'foto_profil_url' => $user->foto_profil
                    ? asset('storage/profiles/' . $user->foto_profil)
                    : null,
                'role' => $user->role,
            ]
        ], 200);
    } catch (Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Gagal memperbarui profil: ' . $e->getMessage()
        ], 500);
    }
}




}
