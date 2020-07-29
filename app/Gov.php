<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Gov
 *
 * @property int $id
 * @property string $ar_gov
 * @property string $en_gov
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\State[] $states
 * @property-read int|null $states_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gov newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gov newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gov query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gov whereArGov($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gov whereEnGov($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gov whereId($value)
 * @mixin \Eloquent
 */
class Gov extends Model
{
    protected $table = 'govs';
    protected $with = ['states'];

    public function states()
    {
        return $this->hasMany(State::class, 'gov_id', 'id');
    }
}
