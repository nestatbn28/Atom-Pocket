<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dompet extends Model
{
    use HasFactory;
    protected $table = 'dompet';
    protected $fillable = [
        'Nama',
        'Referensi',
        'Deskripsi',
        'Status_ID',
    ];
}
