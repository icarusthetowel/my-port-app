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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->integer('duration'); // in minutes
            $table->integer('lessons')->default(0);
            $table->integer('students')->default(0);
            $table->integer('completion_rate')->default(0);
            $table->string('level')->default('beginner'); // beginner, intermediate, advanced
            $table->string('category');
            $table->string('instructor');
            $table->string('image_url')->nullable();
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
