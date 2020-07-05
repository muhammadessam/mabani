<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function buildings()
    {
        return $this->belongsToMany(Building::class, 'buildings_owners', 'owner_id', 'building_id')->withPivot('percentage');
    }
}
