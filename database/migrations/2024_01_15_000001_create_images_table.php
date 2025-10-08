<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->string('imageable_type');
            $table->unsignedBigInteger('imageable_id');
            $table->integer('order')->default(0);
            $table->boolean('is_primary')->default(false);
            $table->string('alt_text')->nullable();
            $table->timestamps();

            $table->index(['imageable_type', 'imageable_id']);
            $table->index('is_primary');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
