<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tricks extends Model
{
    use HasFactory;
    protected $table ='tricks';
    protected $primaryKey = 'kd_tricks';
    protected $fillable = [
        'judul_tricks',
        'gambar_tricks',
        'link_tricks',
    ];
}
