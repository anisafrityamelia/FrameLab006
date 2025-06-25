<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->enum('payment_status', ['pending', 'paid', 'failed', 'expired'])->default('pending');
            $table->string('midtrans_transaction_id')->nullable();
            $table->string('midtrans_payment_type')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->timestamps();

            // Foreign key constraint - sesuaikan dengan nama tabel yang benar
            // $table->foreign('room_id')->references('id')->on('produk_studio');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};