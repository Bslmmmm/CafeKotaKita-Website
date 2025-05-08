<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\KafeController;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return response()->json([
        "message" => "Welcome to Kafe API",
    ]);
});

Route::prefix("auth")->group(function () {
    Route::post("register", [AuthController::class, "register"]);
    Route::post("login", [AuthController::class, "login"]);
});
Route::prefix("kafe")->group(function () {
    Route::get("/", [KafeController::class, "index"]);
    Route::get("/detail/{id}", [KafeController::class, "getDetailKafe"]);
    Route::get("/search", [KafeController::class, "searchKafe"]);
    Route::get("/searchByGenre", [KafeController::class], "searchByGenre");
    Route::post("store", [KafeController::class, "store"]);
    Route::patch("update/{id}", [KafeController::class, "update"]);
    Route::delete("delete/{id}", [KafeController::class, "destroy"]);
});
// Route::prefix("menu")->group(function () {
//     Route::get("/", [ApiKafeController::class, "index"]);
//     Route::get("{id}", [ApiKafeController::class, "show"]);
//     Route::post("store", [ApiKafeController::class, "store"]);
//     Route::patch("update/{id}", [ApiKafeController::class, "update"]);
//     Route::delete("delete/{id}", [ApiKafeController::class, "destroy"]);
// });