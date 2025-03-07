<?php

use App\Http\Controllers\KafeController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

Route::get("/boostrap", function () {
    return view('boostrap');
});

Route::prefix("kafe")->group(function() {
    Route::get("/", [KafeController::class, "index"])->name("kafe.index");
    Route::get("create", [KafeController::class, "create"])->name("kafe.create");
    Route::post("store", [KafeController::class, "store"])->name("kafe.store");
    Route::get("edit/{id}", [KafeController::class, "edit"])->name("kafe.edit");
    Route::patch("update/{id}", [KafeController::class, "update"])->name("kafe.update");
    Route::delete("delete/{id}", [KafeController::class, "destroy"])->name("kafe.destroy");
});
Route::prefix("menu")->group(function() {
    Route::get("/", [MenuController::class, "index"])->name("menu.index");
    Route::get("create", [MenuController::class, "create"])->name("menu.create");
    Route::post("store", [MenuController::class, "store"])->name("menu.store");
    Route::get("edit/{id}", [MenuController::class, "edit"])->name("menu.edit");
    Route::patch("update/{id}", [MenuController::class, "update"])->name("menu.update");
    Route::delete("delete/{id}", [MenuController::class, "destroy"])->name("menu.destroy");
});