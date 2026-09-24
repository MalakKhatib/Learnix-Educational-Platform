<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attendance', function (Blueprint $table) {

            $table->id();

            // الطالب
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            // الدرس
            $table->foreignId('lesson_id')
                ->constrained('lessons')
                ->onDelete('cascade');

            // تاريخ الحضور
            $table->date('date');

            // وقت بدء دراسة الدرس
            $table->dateTime('started_at')
                ->nullable();

            // مجموع وقت دراسة الدرس بالثواني
            $table->unsignedInteger('total_seconds')
                ->default(0);

            // حالة الحضور
            $table->enum('status', [
                'present',
                'absent'
            ])->default('absent');

            $table->timestamps();

            // سجل واحد للطالب في نفس الدرس في نفس اليوم
            $table->unique([
                'user_id',
                'lesson_id',
                'date'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attendance');
    }
};
