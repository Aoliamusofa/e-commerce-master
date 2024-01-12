<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id('id_produk');
            $table->foreignId('id_kat_produk');
            $table->string('nama_produk', 50);
            $table->decimal('harga_barang');
            $table->string('stok_barang', 20);
            $table->string('bahan', 25);
            $table->longText('deskripsi');
            $table->string('warna', 15);
            $table->string('size', 30);
            $table->string('foto_produk', 100);
            $table->timestamps();
            $table->foreign('id_kat_produk')->references('id_kat_produk')->on('kat_produk')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('produk');
    }
};
