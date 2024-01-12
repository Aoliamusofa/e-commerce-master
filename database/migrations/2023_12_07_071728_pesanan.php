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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id('id_pesanan');
            $table->foreignId('id_produk');
            $table->foreignId('user_id');
            $table->foreignId('id_expedisi');
            $table->foreignId('id_pembayaran');
            $table->char('jumlah_pesanan', 10);
            $table->date('tanggal_pesanan');
            $table->string('tinggalkan_pesan');
            $table->string('size_order', 10)->nullable();
            $table->double('total_produk')->nullable();
            $table->double('total_bayar')->nullable();
            $table->string('bukti_pembayaran', 80)->nullable();
            $table->enum('status_pembayaran', ['pending', 'verifikasi', 'lunas'])->default('pending');
            $table->enum('status_pesanan', ['pending', 'diterima', 'kirim', 'selesai'])->default('pending');
            $table->timestamps();
            $table->foreign('id_produk')->references('id_produk')->on('produk')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('user_id')->references('user_id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('id_expedisi')->references('id_expedisi')->on('expedisi')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('id_pembayaran')->references('id_pembayaran')->on('pembayaran')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pesanan');
    }
};
