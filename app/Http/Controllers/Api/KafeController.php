<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kafe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KafeController extends Controller{
    function index() {
        $kafe = Kafe::all();
        return response()->json($kafe, 200);
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