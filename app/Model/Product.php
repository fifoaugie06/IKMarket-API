<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'image', 'type_id', 'price', 'quality_id', 'unit_id'];

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function quality(){
        return $this->belongsTo(Quality::class);
    }

    public function unit(){
        return $this->belongsTo(Unit::class);
    }
}
