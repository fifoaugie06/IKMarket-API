<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Market extends Model
{
    use SoftDeletes;

    public function provincy()
    {
        return $this->belongsTo(Provincy::class, 'province_id');
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function market_category()
    {
        return $this->belongsTo(MarketCategory::class);
    }
}
