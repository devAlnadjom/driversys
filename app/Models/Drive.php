<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Drive extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function driver(){
        return $this->belongsTo(Driver::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function vehicule(){
        return $this->belongsTo(Vehicule::class);
    }

    public function week(){
        return $this->belongsTo(Week::class);
    }

}
