<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menu_kategori', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->uuid("menu_id");
            $table->uuid("kategori_id");
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('menu_id')->references('id')->on('menu')->onDelete('cascade');
            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_kategori');
    }
};
