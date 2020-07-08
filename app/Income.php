<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $guarded = [];


    public function cat()
    {
        return $this->belongsTo(IncomeCategory::class, 'cat_id', 'id');
    }

    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id', 'id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }



}
