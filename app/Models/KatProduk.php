<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KatProduk extends Model
{
    use HasFactory;
    protected $primaryKey = "id_kat_produk";
    protected $table = "kat_produk";
    protected $fillable = ["nama_katproduk"];
}
