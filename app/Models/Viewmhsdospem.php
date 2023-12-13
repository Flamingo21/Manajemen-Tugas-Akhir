<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viewmhsdospem extends Model
{
    use HasFactory;
    public $table = "mhsdospem";

    public function dosens6(){
        return $this->belongsTo(Viewmhsdospem::class, 'nidn');
    }
}
