<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mhms extends Model
{
    protected $primaryKey = 'm_id';
    protected $fillable = [
        'mg_id','m_name',
    ];

    public function mhcId() {
        return $this->hasMany('App\Models\Mhcs','cgm_id');
    }
}
