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
            // Validate input
            $validator = Validator::make($request->all(), [
                'username' => 'required|string|max:255',
                'foto_profil' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Find user
            $user = User::find($id);
            if (!$user) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'User tidak ditemukan'
                ], 404);
            }

            // Update username if provided
            if ($request->has('username')) {
                $user->username = $request->username;
            }

            // Handle profile photo upload
            if ($request->hasFile('foto_profil')) {
                // Delete old photo if exists
                if ($user->foto_profil) {
                    Storage::delete('public/profiles/' . $user->foto_profil);
                }

                // Store new photo
                $file = $request->file('foto_profil');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('public/profiles', $filename);

                $user->foto_profil = $filename;
            }

            $user->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Profil berhasil diperbarui',
                'data' => [
                    'username' => $user->username,
                    'foto_profil_url' => $user->foto_profil
                        ? asset('storage/profiles/' . $user->foto_profil)
                        : null
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
