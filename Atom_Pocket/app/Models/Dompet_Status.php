<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dompet_Status extends Model
{
    use HasFactory;
    protected $table = 'dompet_status';
    protected $fillable = [
        'Nama',
    ];
}
