<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expedisi extends Model
{
    use HasFactory;
    protected $primaryKey = "id_expedisi";
    protected $table = "expedisi";
    protected $fillable = ["nama_expedisi",    "biaya_expedisi",    "jenis_expedisi"];
}
