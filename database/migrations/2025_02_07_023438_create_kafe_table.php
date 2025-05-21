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
        Schema::create('kafe', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('owner_id')->nullable();
            $table->string('nama');
            $table->string('alamat');
            $table->string('telp');
            $table->string('latitude');
            $table->string('longitude');
            $table->time('jam_buka');
            $table->time('jam_tutup');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('owner_id')->references('id')->on('owner')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kafe');
    }
};
