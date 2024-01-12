<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $primaryKey = "id_produk";
    protected $table = "produk";
    protected $fillable = [
        "id_kat_produk",
        "nama_produk",
        "harga_barang",
        "stok_barang",
        "bahan",
        "deskripsi",
        "warna",
        "size",
        "foto_produk"
    ];
    public function JoinToKategoriProduk()
    {
        return $this->hasMany(KatProduk::class, 'id_kat_produk', 'id_kat_produk');
    }
}
