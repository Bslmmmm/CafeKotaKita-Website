<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GenreControlller;
use App\Http\Controllers\KafeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view('index');
});

Route::get('/welcome', function () {
    return view('welcome');
});


// Definisikan route login
Route::get('/login', [AuthController::class, 'index'])->name('login');
// Route Login
Route::post('/login', [AuthController::class, 'login']);
//Route Register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
// Route Logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix("admin")->group(function(){
    Route::get("dashboard", [AdminController::class, "index"])->name("admin.dashboard");
    Route::prefix("kafe")->group(function() {
        Route::get("/", [KafeController::class, "index"])->name("kafe.index");
        Route::get("create", [KafeController::class, "create"])->name("kafe.create");
        Route::post("store", [KafeController::class, "store"])->name("kafe.store");
        Route::get("edit/{id}", [KafeController::class, "edit"])->name("kafe.edit");
        Route::patch("update/{id}", [KafeController::class, "update"])->name("kafe.update");
        Route::delete("delete/{id}", [KafeController::class, "destroy"])->name("kafe.destroy");
    });
    Route::prefix("fasilitas")->group(function() {
        Route::get("/", [FasilitasController::class, "index"])->name("fasilitas.index");
        Route::get("create", [FasilitasController::class, "create"])->name("fasilitas.create");
        Route::post("store", [FasilitasController::class, "store"])->name("fasilitas.store");
        Route::get("edit/{id}", [FasilitasController::class, "edit"])->name("fasilitas.edit");
        Route::patch("update/{id}", [FasilitasController::class, "update"])->name("fasilitas.update");
        Route::delete("delete/{id}", [FasilitasController::class, "destroy"])->name("fasilitas.destroy");
    });
    Route::prefix("genre")->group(function() {
        Route::get("/", [GenreControlller::class, "index"])->name("genre.index");
        Route::get("create", [GenreControlller::class, "create"])->name("genre.create");
        Route::post("store", [GenreControlller::class, "store"])->name("genre.store");
        Route::get("edit/{id}", [GenreControlller::class, "edit"])->name("genre.edit");
        Route::patch("update/{id}", [GenreControlller::class, "update"])->name("genre.update");
        Route::delete("delete/{id}", [GenreControlller::class, "destroy"])->name("genre.destroy");
    });
    Route::prefix("menu")->group(function() {
        Route::get("/", [MenuController::class, "index"])->name("menu.index");
        Route::get("create", [MenuController::class, "create"])->name("menu.create");
        Route::post("store", [MenuController::class, "store"])->name("menu.store");
        Route::get("edit/{id}", [MenuController::class, "edit"])->name("menu.edit");
        Route::patch("update/{id}", [MenuController::class, "update"])->name("menu.update");
        Route::delete("delete/{id}", [MenuController::class, "destroy"])->name("menu.destroy");
    });
    Route::prefix("kategori")->group(function() {
        Route::get("/", [KategoriController::class, "index"])->name("kategori.index");
        Route::get("create", [KategoriController::class, "create"])->name("kategori.create");
        Route::post("store", [KategoriController::class, "store"])->name("kategori.store");
        Route::get("edit/{id}", [KategoriController::class, "edit"])->name("kategori.edit");
        Route::patch("update/{id}", [KategoriController::class, "update"])->name("kategori.update");
        Route::delete("delete/{id}", [KategoriController::class, "destroy"])->name("kategori.destroy");
    });
    Route::prefix("gallery")->group(function() {
        Route::get("/", [GalleryController::class, "index"])->name("gallery.index");
        Route::get("create", [GalleryController::class, "create"])->name("gallery.create");
        Route::post("store", [GalleryController::class, "store"])->name("gallery.store");
        Route::get("edit/{id}", [GalleryController::class, "edit"])->name("gallery.edit");
        Route::patch("update/{id}", [GalleryController::class, "update"])->name("gallery.update");
        Route::delete("delete/{id}", [GalleryController::class, "destroy"])->name("gallery.destroy");
    });
    Route::prefix("user")->group(function () {
        Route::get("/", [UserController::class, "index"])->name("user.index");
        Route::get("owner", [UserController::class, "owner"])->name("user.owner");
        Route::get("validasiOwner/{id}", [UserController::class, "validasiOwner"])->name("user.validasi");
    });
});
