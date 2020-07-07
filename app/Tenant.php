<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class, 'tenant_id', 'id');
    }

}
