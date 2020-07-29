<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\State
 *
 * @property int $id
 * @property string $ar_state
 * @property string $en_state
 * @property string $gov_id
 * @property-read \App\Gov $gov
 * @method static \Illuminate\Database\Eloquent\Builder|\App\State newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\State newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\State query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\State whereArState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\State whereEnState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\State whereGovId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\State whereId($value)
 * @mixin \Eloquent
 */
class State extends Model
{
    protected $table = 'states';

    public function gov()
    {
        return $this->belongsTo(Gov::class, 'gov_id', 'id');
    }
}
