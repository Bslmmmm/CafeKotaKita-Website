<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\BookmarkApiController;
use App\Http\Controllers\Api\FasilitasApiController;
use App\Http\Controllers\Api\GenreApiController;
use App\Http\Controllers\Api\KafeApiController;
use App\Http\Controllers\Api\MenuApiController;
use App\Http\Controllers\Api\RatingApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\CommunityController;

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

Route::prefix("user")->group(function () {
    Route::get("findById/{id}", [UserApiController::class, "searchById"]);
    Route::patch("update/{id}", [UserApiController::class, "update"]);
});

Route::prefix('community')->group(function () {
    Route::get('/', [CommunityController::class, 'index']);              // GET /api/community
    Route::post('/', [CommunityController::class, 'store']);             // POST /api/community
    Route::get('/{id}', [CommunityController::class, 'show']);           // GET /api/community/{id}
    Route::put('/{id}', [CommunityController::class, 'update']);         // PUT /api/community/{id}
    Route::delete('/{id}', [CommunityController::class, 'destroy']);     // DELETE /api/community/{id}

    Route::post('/{id}/like', [CommunityController::class, 'like']);     // POST /api/community/{id}/like
    Route::delete('/{id}/like', [CommunityController::class, 'unlike']); // DELETE /api/community/{id}/like
    Route::get('/{id}/like', [CommunityController::class, 'checkLike']); // GET /api/community/{id}/like?user_id=xxx

    Route::get('/user/{userId}', [CommunityController::class, 'getByUser']); // GET /api/community/user/{userId}
    Route::get('/trending/community', [CommunityController::class, 'trending']); // GET /api/community/trending/community
});
