<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $guarded = [];

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
    public function tenant(){
        return $this->belongsTo(Tenant::class, 'tenant_id', 'id');
    }
}
