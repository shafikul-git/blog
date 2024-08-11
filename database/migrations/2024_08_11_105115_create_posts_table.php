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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('meta_title');
            $table->enum('status', ['draft', 'published', 'archived', 'pending']);
            $table->text('meta_keywords');
            $table->text('meta_description');
            $table->text('content');
            $table->text('featured_image');
            $table->string('alt_name');
            $table->timestamp('published_at');
            $table->foreignId('author_id')->references('id')->on('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
