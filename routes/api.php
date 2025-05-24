<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\BookmarkApiController;
use App\Http\Controllers\Api\FasilitasApiController;
use App\Http\Controllers\Api\GenreApiController;
use App\Http\Controllers\Api\KafeApiController;
use App\Http\Controllers\Api\MenuApiController;
use App\Http\Controllers\Api\RatingApiController;
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
    Route::post("verifyOtp", [AuthApiController::class, "verifyOtp"]);
    Route::post("resetpassword", [AuthApiController::class, "resetpassword"]);
    Route::post("checkusername", [AuthApiController::class, "checkusername"]);
    Route::post("checkemail", [AuthApiController::class, "checkemail"]);


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
Route::prefix("rating")->group(function () {
    Route::post("addRate", [RatingApiController::class, "store"]);
});
Route::prefix("bookmark")->group(function () {
    Route::get("findBookmarkByUser/{id}", [BookmarkApiController::class, "index"]);
    Route::post("addBookmark", [BookmarkApiController::class, "store"]);
    Route::delete("removeBookmark", [BookmarkApiController::class, "destroy"]);
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
