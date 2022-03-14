<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicule extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=[];

    public function carrental(){
        return $this->belongsTo(Carrental::class);

    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where('model', 'like', '%'.$search.'%');
        });
        /* ->when($filters['trashed'] ?? null, function ($query, $trashed) {
            //$query->where('status', '=', $trashed);
            if ($trashed === 'with') {
                $query->withTrashed();
            } elseif ($trashed === 'only') {
                $query->onlyTrashed();
            }
            if ($trashed === '1') {
                $query->where('avaible', '1');
            } elseif ($trashed === '0') {
                $query->where('avaible','<>', '1');
            }
        });
        // ->when($filters['avaible'] ?? null, function ($query, $avaible) {
        //     //$query->where('status', '=', $trashed);
        //     if ($avaible === '1') {
        //         $query->where('avaible', '1');
        //     } elseif ($avaible === '0') {
        //         $query->where('avaible', '0');
        //     }
        // });*/
    }

}
