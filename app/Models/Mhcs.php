<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mhcs extends Model
{
    protected $primaryKey = 'c_id';
    protected $fillable = [
        'cg_id','c_name','cgl_id','cgm_id','c_sdate','c_edate'
    ];

    public function mhlId() {
        return $this->belongsTo('App\Models\Mhls','cgl_id');
    }

    public function mhmId() {
        return $this->belongsTo('App\Models\Mhms','cgm_id');
    }

    
}
