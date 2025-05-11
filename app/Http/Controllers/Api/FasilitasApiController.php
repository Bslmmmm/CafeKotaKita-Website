<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use App\Models\Kafe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class FasilitasApiController extends Controller
{
    public function index()
    {
        try {
            $data = Fasilitas::all();

            if ($data->isEmpty()) {
                return response()->json([
                    "status" => "success",
                    "message" => "No facilities found",
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
                "message" => "Failed to retrieve data: " . $e->getMessage()
            ], 500);
        }
    }

    public function searchById($id)
    {
        try {
            $data = Fasilitas::with("kafe")->findOrFail($id);

            return response()->json([
                "status" => "success",
                "message" => "Berhasil mengambil data",
                "data" => $data
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                "status" => "error",
                "message" => "Facility not found with id: " . $id
            ], 404);
        } catch (Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => "Failed to retrieve data: " . $e->getMessage()
            ], 500);
        }
    }

    public function getRecommendedKafe()
    {
        // $data = Kafe::
    }

    public function search(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'q' => 'sometimes|string|max:255'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "status" => "error",
                    "message" => "Validation error",
                    "errors" => $validator->errors()
                ], 422);
            }

            $keyword = $request->input("q");
            $query = Fasilitas::with("genre");

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
                    "message" => "No matching facilities found",
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
                "message" => "Failed to search facilities: " . $e->getMessage()
            ], 500);
        }
    }
}
