<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $fillable = [
        'Kode',
        'Deskripsi',
        'Tanggal',
        'Nilai',
        'Dompet_ID',
        'Kategori_ID',
        'Status_ID',
    ];
}
