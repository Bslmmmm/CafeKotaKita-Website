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
        Schema::create('bookmark_kafe', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->uuid("user_id");
            $table->uuid("kafe_id");
            
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('kafe_id')->references('id')->on('kafe')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookmark_kafe');
    }
};
