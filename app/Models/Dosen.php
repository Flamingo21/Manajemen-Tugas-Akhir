<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    public function users2(){
        return $this->belongsTo(User::class,'id_user');
    }

    public function dospems4(){
        return $this->hasMany(Dospem::class);
    }

    public function mhsdospems4(){
        return $this->hasMany(Dospem::class);
    }
}
