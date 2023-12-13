<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prasempro extends Model
{
    use HasFactory;
    protected $table = "prasempros";
    protected $fillable = 
    ['nim',
    'bidang',
    'judul',
    'diajukan_oleh',
    'berkas_uji',
    'nilai_uji',
    'catatan_uji',
    'berkas_sempro',
    'status',
    'id_sempro',
    ];
}
