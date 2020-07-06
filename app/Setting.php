<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = [];

    public static function MainSettings(){
        return Setting::all()->first();
    }
}
