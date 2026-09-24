<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ratings', function (Blueprint $table) {

            $table->id();

            // الطالب

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // الكورس

            $table->foreignId('course_id')
                ->constrained()
                ->cascadeOnDelete();

            // عدد النجوم

            $table->unsignedTinyInteger('rating');

            // التعليق

            $table->text('comment')
                ->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};