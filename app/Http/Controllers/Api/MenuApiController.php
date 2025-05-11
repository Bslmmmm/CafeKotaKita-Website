<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Collection;

class MenuApiController extends Controller
{
    public function index()
    {
        try {
            $data = Menu::all();

            if ($data->isEmpty()) {
                return response()->json([
                    "status" => "success",
                    "message" => "Tidak ada data Menu ditemukan",
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
                "message" => "Gagal mengambil data menu: " . $e->getMessage()
            ], 500);
        }
    }

    public function searchById($id)
    {
        try {
            $data = Menu::with("kafe")->find($id);

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

    public function getRecommendedKafe()
    {
        // TODO: Implement recommendation logic
    }

    public function searchByMenuName(Request $request)
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
}
