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
        Schema::create('genre_kafe', function (Blueprint $table) {
            $table->uuid("id");
            $table->uuid("kafe_id");
            $table->uuid("genre_id");
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('kafe_id')->references('id')->on('kafe')->onDelete('cascade');
            $table->foreign('genre_id')->references('id')->on('genre')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genre_kafe');
    }
};
