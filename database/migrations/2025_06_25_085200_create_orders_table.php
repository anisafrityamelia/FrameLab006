<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('code_order')->unique();
            $table->unsignedBigInteger('room_id');
            $table->date('order_date');
            $table->json('order_times');
            $table->decimal('total_amount', 10, 2);
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');
            $table->string('snap_token')->nullable();
            $table->string('payment_proof')->nullable();
            $table->timestamps();

            $table->foreign('room_id')->references('id')->on('produk_studio');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}