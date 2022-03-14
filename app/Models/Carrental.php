<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carrental extends Model
{
    use HasFactory;

    public function vehicules(){
        return $this->hasMany(Vehicule::class);
    }
}
