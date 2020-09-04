<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    public function district()
    {
        return $this->hasMany(District::class, 'regency_id');
    }
}
