<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('community', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('username');
            $table->text('caption');
            $table->string('image_url')->nullable();
            $table->string('mood')->nullable();
            $table->string('location')->nullable();
            $table->string('shared_menu_id')->nullable();
            $table->string('profile_image_url')->nullable();
            $table->string('user_tag')->nullable();

            $table->json('liked_by')->nullable();
            $table->integer('like_count')->default(0);
            $table->integer('comment_count')->default(0);
            $table->integer('retweet_count')->default(0);
            $table->integer('view_count')->default(0);

            $table->timestamps();

            $table->index('user_id');
            $table->index('username');
            $table->index('created_at');
            $table->index('like_count');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('community');
    }
};
