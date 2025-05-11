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
        Schema::create('reservation', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->uuid("kafe_id");
            $table->uuid("user_id");
            $table->string("nama");
            $table->string("no_telp");
            $table->date("tanggal");
            $table->time("jam");
            $table->integer("jumlah_orang");
            $table->string("status")->default("pending");
            $table->string("pesan")->nullable();
            $table->string("no_meja")->nullable();
            $table->string("bukti_pembayaran")->default("unpaid");
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('kafe_id')->references('id')->on('kafe')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation');
    }
};
