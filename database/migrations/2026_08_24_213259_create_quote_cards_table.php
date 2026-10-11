<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quote_cards', function (Blueprint $table) {
            $table->id();
            $table->text('quote');
            $table->string('reference')->nullable();
            $table->string('author')->nullable();
            $table->string('background_type')->default('color');
            $table->string('background_value')->nullable();
            $table->string('text_color')->nullable();
            $table->boolean('is_published')->default(false);
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quote_cards');
    }
};