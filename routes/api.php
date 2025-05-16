<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\FasilitasApiController;
use App\Http\Controllers\Api\GenreApiController;
use App\Http\Controllers\Api\KafeApiController;
use App\Http\Controllers\Api\MenuApiController;
use Illuminate\Support\Facades\Route;


Route::get("/", function () {
    return response()->json([
        "message" => "Welcome to Kafe API",
    ]);
});

Route::prefix("auth")->group(function () {
    Route::post("register", [AuthApiController::class, "register"]);
    Route::post("login", [AuthApiController::class, "login"]);
    Route::post("forgotpassword", [AuthApiController::class, "forgotpassword"]);
    Route::post("verifyotp", [AuthApiController::class, "verifyotp"]);
    Route::post("resetpassword", [AuthApiController::class, "resetpassword"]);

});
Route::prefix("kafe")->group(function () {
    Route::get("/findAll", [KafeApiController::class, "index"]);
    Route::get("/detail/{id}", [KafeApiController::class, "getDetailKafe"]);
    Route::get("/search", [KafeApiController::class, "searchKafe"]);
    Route::post("store", [KafeApiController::class, "store"]);
    Route::patch("update/{id}", [KafeApiController::class, "update"]);
    Route::delete("delete/{id}", [KafeApiController::class, "destroy"]);
});
Route::prefix("genre")->group(function () {
    Route::get("findAll", [GenreApiController::class, "index"]);
    Route::get("findKafeByGenre/{id}", [GenreApiController::class, "searchById"]);
});
Route::prefix("menu")->group(function () {
    Route::get("findAll", [MenuApiController::class, "index"]);
    Route::get("findKafeByMenu/{id}", [MenuApiController::class, "searchById"]);
});
Route::prefix("fasilitas")->group(function () {
    Route::get("findAll", [FasilitasApiController::class, "index"]);
    Route::get("searchFasilitas", [FasilitasApiController::class, "search"]);
    Route::get("findKafeByFasilitas/{id}", [FasilitasApiController::class, "searchById"]);
});
// Route::prefix("menu")->group(function () {
//     Route::get("/", [ApiKafeController::class, "index"]);
//     Route::get("{id}", [ApiKafeController::class, "show"]);
//     Route::post("store", [ApiKafeController::class, "store"]);
//     Route::patch("update/{id}", [ApiKafeController::class, "update"]);
//     Route::delete("delete/{id}", [ApiKafeController::class, "destroy"]);
// });




