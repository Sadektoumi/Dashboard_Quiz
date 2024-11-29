<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('Title');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->date('date');
            $table->integer('time_limit'); // Time limit in minutes
            $table->integer('attempts_allowed');
            $table->integer('points');
            $table->text('instructions')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
