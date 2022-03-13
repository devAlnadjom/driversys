<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicule extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function carrental(){
        return $this->belongsTo(Carrental::class);

    }

}
