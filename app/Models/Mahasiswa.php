<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    public function users1(){
        return $this->belongsTo(User::class,'id_user');
    }

    public function dospems3(){
        return $this->hasMany(Dospem::class);
    }

    public function prasempros5(){
        return $this->hasMany(Prasempro::class);
    }
}
