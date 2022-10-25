<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mhls extends Model
{
    protected $primaryKey = 'l_id';
    protected $fillable = [
        'lg_id',
    ];
    public function mhcId() {
        return $this->hasMany('App\Models\Mhcs','cgl_id');
    }
}
