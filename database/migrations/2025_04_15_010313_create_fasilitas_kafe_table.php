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
        Schema::create('fasilitas_kafe', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->uuid("kafe_id");
            $table->uuid("facility_id");
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('facility_id')->references('id')->on('fasilitas')->onDelete('cascade');
            $table->foreign('kafe_id')->references('id')->on('kafe')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cafe_facility');
    }
};
