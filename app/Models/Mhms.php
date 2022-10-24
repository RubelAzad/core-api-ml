<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mhms extends Model
{
    protected $primaryKey = 'm_id';
    protected $fillable = [
        'mg_id','m_name',
    ];
}
