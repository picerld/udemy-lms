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
            $table->enum('type', ['webinar', 'course']);
            $table->string('title', 100);
            $table->string('slug', 100)->unique();
            $table->string('seo_description', 255)->nullable();
            $table->string('duration', 50);
            $table->string('timezone', 50);
            $table->string('thumbnail')->nullable();
            $table->enum('demo_video_storage', ['upload', 'youtube', 'vimeo', 'external_link']);
            $table->text('demo_video_source')->nullable();
            $table->text('description');
            $table->integer('capacity')->default(0);
            $table->double('price')->default(0);
            $table->double('discount')->default(0);
            $table->integer('certificate')->default(0);
            $table->integer('qna');
            $table->text('message_for_reviewer');
            $table->enum('is_approved', ['pending', 'approved', 'rejected'])->default('pending');
            $table->enum('status', ['active', 'inactive', 'draft'])->default('draft');

            $table->unsignedBigInteger('level_id')->nullable();
            $table->unsignedBigInteger('language_id')->nullable();
            $table->unsignedBigInteger('instructor_id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->timestamps();

            $table->foreign('level_id')->references('id')->on('course_levels')->onDelete('cascade');
            $table->foreign('language_id')->references('id')->on('course_languages')->onDelete('cascade');
            $table->foreign('instructor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('course_categories')->onDelete('cascade');
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
