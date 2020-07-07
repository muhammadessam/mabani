<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    protected $fillable = ['floor'];

    public function units()
    {
        return $this->hasMany(Unit::class, 'floor_id', 'id');
    }
}
