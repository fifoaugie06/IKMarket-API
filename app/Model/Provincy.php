<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Provincy extends Model
{
    public function regency()
    {
        return $this->hasMany(Regency::class, 'province_id');
    }
}
