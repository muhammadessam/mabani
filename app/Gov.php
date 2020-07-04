<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gov extends Model
{
    protected $table = 'govs';

    public function states(){
        return $this->hasMany(State::class, 'gov_id', 'id');
    }
}
