<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = "pesanan";
    protected $primaryKey = "id_pesanan";
    protected $fillable = [
        "id_produk",
        "user_id",
        "id_expedisi",
        "id_pembayaran",
        "jumlah_pesanan",
        "tanggal_pesanan",
        "tinggalkan_pesan",
        "size_order",
        "total_produk",
        "total_bayar",
        "bukti_pembayaran",
        "status_pembayaran",
        "status_pesanan"
    ];
    public function scopeJoinToProduk($query)
    {
        return $query->leftJoin('produk', 'pesanan.id_produk', 'produk.id_produk');
    }
    public function scopeJoinToUser($query)
    {
        return $query->leftJoin('users', 'users.user_id', 'pesanan.user_id');
    }
    public function scopeJoinToExpedisi($query)
    {
        return $query->leftJoin('expedisi', 'expedisi.id_expedisi', 'pesanan.id_expedisi');
    }
    public function scopeJoinToPembayaran($query)
    {
        return $query->leftJoin('pembayaran', 'pembayaran.id_pembayaran', 'pesanan.id_pembayaran');
    }
}
