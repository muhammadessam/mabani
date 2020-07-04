<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';

    public function gov()
    {
        return $this->belongsTo(Gov::class, 'gov_id', 'id');
    }
}
