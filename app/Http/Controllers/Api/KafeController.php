<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Kafe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KafeController extends Controller{
    function index() {
        $kafe = Kafe::where(["status" => "buka"])->get();
        return response()->json([
            "status" => "success",
            "message" => "Berhasil mengambil data kafe", 
            "data" => $kafe], 200);
    }
    function getRecommendedKafe()
    {
        // $kafe = Kafe::
    }
    function searchKafe(Request $req)
    {
        $keyword = $req->input("q");
        $query = Kafe::with("genre");
        if ($keyword) {
        $query->where(function ($q) use ($keyword) {
            $q->where('nama', 'LIKE', "%{$keyword}%")
              ->orWhereHas('genre', function ($q2) use ($keyword) {
                  $q2->where('nama', 'LIKE', "%{$keyword}%");
              });
        });
    }

        $query->get();
        return response()->json([
            "status" => "success",
            "message" => "Berhasil mengambil data kafe", 
            "data" => $query], 200); 

    }
    
public function searchByGenreName(Request $request)
{
    $keyword = $request->input('q');

    $genres = Genre::with('kafe')
        ->where('nama', 'LIKE', "%{$keyword}%")
        ->get();

    // Flatten kafes from matching genres (in case multiple genres match)
    $kafes = $genres->flatMap(function ($genre) {
        return $genre->kafes;
    })->unique('id')->values(); // remove duplicates if any

    return response()->json([
        'success' => true,
        'data' => $kafes
    ]);
}
    function getDetailKafe($id)
    {
        $data = Kafe::with("gallery")->findOrFail($id); 
          return response()->json([
            "status" => "success",
            "message" => "Berhasil mengambil data kafe", 
            "data" => $data], 200); 
    }
    function storeData(Request $req) {
        $validator = Validator::make($req->all(),[
            'nama' => 'required',
            'alamat' => 'required|max:200',
            'latitude' => 'required',
            'longitude' => 'required',
            'status' => 'required'
        ]);
        if($validator->fails())
        {
            return response()->json([
                "status" => "error",
                "message" => "Tidak dapat menambahkan kafe" 
            ], 400);
        }
        Kafe::create($validator->validated());
        return response()->json([
            "status" => "success",
            "message" => "Berhasil menambahkan data"
        ], 200);
    }
    function updateData(Request $req, $id) {
        $validator = Validator::make($req->all(), [
            "alamat" => "required",
            "latitude" => "required",
            "longitude" => "required"
        ]);
        if($validator->fails())
        {
            return response()->json([
                "status" => "error",
                "message" => $validator->messages()
            ], 400);
        }
        Kafe::findOrFail($id)->update($req->all());
        return response()->json([
            "status" => "error",
            "message" => "Berhasil mengubah data kafe"
        ], 200);
    }
    function deleteData($id){
        $kafe =  Kafe::findOrFail($id)->delete();
        if($kafe){
            return response()->json([
                "status" => "error",
                "message" => "Berhasil menghapus data kafe"
            ]);
        }

    }
}