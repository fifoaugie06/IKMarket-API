<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Market extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'image', 'province_id', 'regency_id', 'district_id', 'fulladdress', 'longlat', 'market_category_id'];

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
