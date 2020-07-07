<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{

    protected $guarded = [];


    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id', 'id');
    }

    public function floor()
    {
        return $this->belongsTo(Floor::class, 'floor_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo(UnitType::class, 'unit_type_id', 'id');
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class, 'unit_id', 'id');
    }
}

