<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Kafe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Collection;

class GenreApiController extends Controller
{
    public function index()
    {
        try {
            $data = Genre::all();

            if ($data->isEmpty()) {
                return response()->json([
                    "status" => "success",
                    "message" => "Tidak ada data genre ditemukan",
                    "data" => []
                ], 200);
            }

            return response()->json([
                "status" => "success",
                "message" => "Berhasil mengambil data",
                "data" => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => "Gagal mengambil data genre: " . $e->getMessage()
            ], 500);
        }
    }

    public function searchById($id)
    {
        try {
            $data = Genre::with(["kafe" => function ($query) {
                $query->withAvg('rating as total_rating', 'rate');
            },   "kafe.gallery" => function ($query) {
                $query->where('type', 'main_content');
            },])->find($id);

            if (empty($data)) {
                return response()->json([
                    "status" => "error",
                    "message" => "Genre tidak ditemukan dengan ID: " . $id,
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
                "message" => "Gagal mengambil data genre: " . $e->getMessage()
            ], 500);
        }
    }

    public function getRecommendedKafe()
    {
        // TODO: Implement recommendation logic
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
            },  "gallery" => function ($query) {
                $query->where('type', 'main_content');
            },])
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
}
