<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/xxxx_xx_xx_create_users_table.php

public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('first_name');
        $table->string('last_name');
        $table->string('email')->unique();
        $table->string('password');
        $table->text('achievements')->nullable();
        $table->integer('quizzes_passed')->default(0);
        $table->integer('fastest_time')->nullable(); // Assuming this is in seconds
        $table->integer('correct_answers')->default(0);
        $table->timestamps();
    });
}

};
