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
        Schema::create('course_chapter_lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('slug', 100)->unique();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('instructor_id');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('chapter_id');
            $table->text('file_path')->nullable();
            $table->enum('storage', ['upload', 'youtube', 'vimeo', 'external_link'])->default('upload');
            $table->string('volume', 50)->nullable();
            $table->string('duration', 50)->nullable();
            $table->enum('file_type', ['video', 'audio', 'pdf', 'docx', 'file', 'html5'])->default('video');
            $table->boolean('downloadable')->default(false);
            $table->integer('order')->default(0);
            $table->boolean('is_preview')->default(false);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->enum('lesson_type', ['lesson']);
            $table->timestamps();

            $table->foreign('instructor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_chapter_lessons');
    }
};
