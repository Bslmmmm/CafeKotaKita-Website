<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fasilitas_kafe', function (Blueprint $table) {
            $table->uuid("kafe_id");
            $table->uuid("fasilitas_id");
            $table->timestamps();
            $table->softDeletes();

            $table->primary(['kafe_id', 'fasilitas_id']);

            $table->foreign('fasilitas_id')->references('id')->on('fasilitas')->onDelete('cascade');
            $table->foreign('kafe_id')->references('id')->on('kafe')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fasilitas_kafe');
    }
};
