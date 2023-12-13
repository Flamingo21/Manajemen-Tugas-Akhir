<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dospem extends Model
{
    use HasFactory;
    
    public function mahasiswas3(){
        return $this->belongsTo(Mahasiswa::class, 'nim');
    }

    public function dosens4(){
        return $this->belongsTo(Dosen::class, 'nidn');
    }
    
}
