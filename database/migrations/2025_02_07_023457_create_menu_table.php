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
        Schema::create('menu', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid("kafe_id");
            $table->string('nama');
            $table->integer("harga");
            $table->string("image")->nullable();
            $table->enum("status", ["tersedia", "habis"]);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign("kafe_id")->references("id")->on("kafe")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
