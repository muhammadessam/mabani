<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\UnitType
 *
 * @property int $id
 * @property string $name
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Unit[] $units
 * @property-read int|null $units_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UnitType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UnitType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UnitType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UnitType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UnitType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UnitType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UnitType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UnitType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UnitType extends Model
{
    protected $fillable = ['name'];

    public function units()
    {
        return $this->hasMany(Unit::class, 'unit_type_id', 'id');
    }
}
