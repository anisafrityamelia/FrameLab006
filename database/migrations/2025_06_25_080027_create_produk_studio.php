<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukStudio extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produk_studio', function (Blueprint $table) {
            $table->id();
            $table->string('photo', 255);
            $table->string('room_name', 100);
            $table->text('description');
            $table->string('duration', 255);
            $table->bigInteger('price');
            $table->enum('studio_type', ['Studio Photo', 'Studio Space', 'Studio Video', 'Studio Partner']);
            $table->timestamps(); // optional, bisa dihapus kalau tidak dipakai
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk_studio');
    }
}