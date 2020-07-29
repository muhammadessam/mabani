<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Floor
 *
 * @property int $id
 * @property string $floor
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Unit[] $units
 * @property-read int|null $units_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Floor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Floor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Floor query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Floor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Floor whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Floor whereFloor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Floor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Floor whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Floor extends Model
{
    protected $fillable = ['floor'];

    public function units()
    {
        return $this->hasMany(Unit::class, 'floor_id', 'id');
    }
}
