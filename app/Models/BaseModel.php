<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $startVlaue;
    protected $lengthVlaue;

    public function setStartValue($startVlaue)
    {
        $this->startVlaue = $startVlaue;
    }
    public function setLengthValue($lengthVlaue)
    {
        $this->lengthVlaue = $lengthVlaue;
    }
}
