<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Unit
 *
 * @property int $id
 * @property string $name
 * @property string $water_account
 * @property string $electricity_account
 * @property int $unit_type_id
 * @property int $floor_id
 * @property int $building_id
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Building $building
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Contract[] $contracts
 * @property-read int|null $contracts_count
 * @property-read \App\Floor $floor
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Income[] $incomes
 * @property-read int|null $incomes_count
 * @property-read \App\UnitType $type
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Unit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Unit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Unit query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Unit whereBuildingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Unit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Unit whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Unit whereElectricityAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Unit whereFloorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Unit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Unit whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Unit whereUnitTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Unit whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Unit whereWaterAccount($value)
 * @mixin \Eloquent
 */
class Unit extends Model
{

    protected $guarded = [];


    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id', 'id');
    }

    public function floor()
    {
        return $this->belongsTo(Floor::class, 'floor_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo(UnitType::class, 'unit_type_id', 'id');
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class, 'unit_id', 'id');
    }

    public function incomes()
    {
        return $this->hasMany(Income::class, 'unit_id', 'id');
    }

}

