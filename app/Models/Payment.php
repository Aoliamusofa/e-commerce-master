<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = "pembayaran";
    protected $primaryKey = "id_pembayaran";
    protected $fillable = [
        "metode_pembayaran", "nomor_rekening"
    ];
}
