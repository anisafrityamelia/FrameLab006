<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsers extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 100)->unique();
            $table->string('email', 100);
            $table->enum('role', ['admin', 'user'])->default('user');
            $table->string('photo', 255)->nullable();
            $table->string('noTelepon', 20);
            $table->date('date');
            $table->string('password', 255);
            $table->timestamp('created_at')->nullable();
            $table->string('remember_token', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}