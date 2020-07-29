<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Building
 *
 * @property int $id
 * @property int $gov_id
 * @property int $state_id
 * @property string $block_number
 * @property string $plot_number
 * @property string|null $img
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Gov $gov
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Owner[] $owners
 * @property-read int|null $owners_count
 * @property-read \App\State $state
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Unit[] $units
 * @property-read int|null $units_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereBlockNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereGovId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building wherePlotNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Building extends Model
{
    protected $guarded = [];

    public function gov()
    {
        return $this->belongsTo(Gov::class, 'gov_id', 'id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    public function owners()
    {
        return $this->belongsToMany(Owner::class, 'buildings_owners', 'building_id', 'owner_id')->withPivot('percentage');
    }

    public function units()
    {
        return $this->hasMany(Unit::class, 'building_id', 'id');
    }

    public function incomes()
    {
        return $this->hasMany(Income::class, 'building_id', 'id');
    }
}
