<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukPartnerTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produk_partner', function (Blueprint $table) {
            $table->id();
            $table->string('photo', 255);
            $table->string('photo1', 255);
            $table->string('photo2', 255);
            $table->string('photo3', 255);
            $table->string('room_name', 100);
            $table->text('description1');
            $table->text('description2');
            $table->text('description3');
            $table->string('noTelepon', 20);
            $table->enum('studio_type', ['Studio Partner']);
            $table->timestamps(); // Tambahan opsional, bisa dihapus kalau tidak dipakai
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk_partner');
    }
}