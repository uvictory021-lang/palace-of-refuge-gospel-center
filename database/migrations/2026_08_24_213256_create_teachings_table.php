<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('teachings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('type');
            $table->text('description')->nullable();
            $table->string('speaker')->nullable();
            $table->date('teaching_date')->nullable();
            $table->string('audio_path')->nullable();
            $table->string('video_url')->nullable();
            $table->string('thumbnail_path')->nullable();
            $table->string('scripture_reference')->nullable();
            $table->string('status')->default('draft');
            $table->timestamp('published_at')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();

            $table->index(['type', 'status', 'published_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teachings');
    }
};