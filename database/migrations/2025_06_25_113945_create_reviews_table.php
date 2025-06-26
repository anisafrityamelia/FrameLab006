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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('code_order');
            $table->unsignedBigInteger('room_id');
            $table->string('user_name');
            $table->string('user_email')->nullable();
            $table->integer('rating')->comment('1-5 stars');
            $table->text('feedback');
            $table->timestamps();
            
            // Foreign key constraints
            $table->foreign('code_order')
                  ->references('code_order')
                  ->on('orders')
                  ->onDelete('cascade');
                  
            $table->foreign('room_id')
                  ->references('id')
                  ->on('produk_studio')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};