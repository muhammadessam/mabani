<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $guarded = [];

    public function gov()
    {
        return $this->belongsTo(Gov::class, 'gov_id', 'id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    public function owners()
    {
        return $this->belongsToMany(Owner::class, 'buildings_owners', 'building_id', 'owner_id')->withPivot('percentage');
    }
}
