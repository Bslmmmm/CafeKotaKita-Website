<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Kafe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Collection;

class KafeApiController extends Controller
{
    public function index()
    {
        try {
            $kafe = Kafe::with(["genre", "fasilitas", "gallery"])
                ->where("status", "buka")
                ->get();

            if ($kafe->isEmpty()) {
                return response()->json([
                    "status" => "success",
                    "message" => "Tidak ada kafe yang sedang buka",
                    "data" => []
                ], 200);
            }

            return response()->json([
                "status" => "success",
                "message" => "Berhasil mengambil data kafe",
                "data" => $kafe
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => "Gagal mengambil data kafe: " . $e->getMessage()
            ], 500);
        }
    }

    public function getRecommendedKafe()
    {
        // TODO: Implement recommendation logic
    }

    public function searchKafe(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'q' => 'sometimes|string|max:255'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "status" => "error",
                    "message" => "Validasi gagal",
                    "errors" => $validator->errors()
                ], 422);
            }

            $keyword = $request->input("q");
            $query = Kafe::with("genre")->where("status", "buka");

            if ($keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('nama', 'LIKE', "%{$keyword}%")
                        ->orWhereHas('genre', function ($q2) use ($keyword) {
                            $q2->where('nama', 'LIKE', "%{$keyword}%");
                        });
                });
            }

            $results = $query->get();

            if ($results->isEmpty()) {
                return response()->json([
                    "status" => "success",
                    "message" => "Tidak ditemukan kafe yang sesuai",
                    "data" => []
                ], 200);
            }

            return response()->json([
                "status" => "success",
                "message" => "Berhasil mengambil data kafe",
                "data" => $results
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => "Gagal melakukan pencarian: " . $e->getMessage()
            ], 500);
        }
    }

    public function searchByGenreName(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'q' => 'required|string|min:1|max:255'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "status" => "error",
                    "message" => "Validasi gagal",
                    "errors" => $validator->errors()
                ], 422);
            }

            $keyword = $request->input('q');

            $genres = Genre::with(['kafe' => function ($query) {
                $query->where('status', 'buka');
            }])
                ->where('nama', 'LIKE', "%{$keyword}%")
                ->get();

            if ($genres->isEmpty()) {
                return response()->json([
                    "status" => "success",
                    "message" => "Tidak ditemukan genre dengan nama tersebut",
                    "data" => []
                ], 200);
            }

            $kafes = $genres->flatMap(function ($genre) {
                return $genre->kafe ?: new Collection();
            })->unique('id')->values();

            if ($kafes->isEmpty()) {
                return response()->json([
                    "status" => "success",
                    "message" => "Tidak ditemukan kafe yang buka dengan genre tersebut",
                    "data" => []
                ], 200);
            }

            return response()->json([
                "status" => "success",
                "message" => "Berhasil menemukan kafe",
                "data" => $kafes
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => "Gagal melakukan pencarian: " . $e->getMessage()
            ], 500);
        }
    }

    public function getDetailKafe($id)
    {
        try {
            $data = Kafe::with("gallery")->find($id);

            if (empty($data)) {
                return response()->json([
                    "status" => "error",
                    "message" => "Kafe tidak ditemukan",
                    "data" => null
                ], 404);
            }

            return response()->json([
                "status" => "success",
                "message" => "Berhasil mengambil data kafe",
                "data" => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => "Gagal mengambil detail kafe: " . $e->getMessage()
            ], 500);
        }
    }

    public function storeData(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama' => 'required',
                'alamat' => 'required|max:200',
                'latitude' => 'required',
                'longitude' => 'required',
                'status' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "status" => "error",
                    "message" => "Validasi gagal",
                    "errors" => $validator->errors()
                ], 422);
            }

            Kafe::create($validator->validated());

            return response()->json([
                "status" => "success",
                "message" => "Berhasil menambahkan data kafe"
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => "Gagal menambahkan kafe: " . $e->getMessage()
            ], 500);
        }
    }

    public function updateData(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                "alamat" => "required",
                "latitude" => "required",
                "longitude" => "required"
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "status" => "error",
                    "message" => "Validasi gagal",
                    "errors" => $validator->errors()
                ], 422);
            }

            $kafe = Kafe::find($id);

            if (empty($kafe)) {
                return response()->json([
                    "status" => "error",
                    "message" => "Kafe tidak ditemukan"
                ], 404);
            }

            $kafe->update($validator->validated());

            return response()->json([
                "status" => "success",
                "message" => "Berhasil mengubah data kafe"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => "Gagal mengupdate kafe: " . $e->getMessage()
            ], 500);
        }
    }

    public function deleteData($id)
    {
        try {
            $kafe = Kafe::find($id);

            if (empty($kafe)) {
                return response()->json([
                    "status" => "error",
                    "message" => "Kafe tidak ditemukan"
                ], 404);
            }

            $kafe->delete();

            return response()->json([
                "status" => "success",
                "message" => "Berhasil menghapus data kafe"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => "Gagal menghapus kafe: " . $e->getMessage()
            ], 500);
        }
    }
}
