<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Income
 *
 * @property int $id
 * @property int $cat_id
 * @property int|null $building_id
 * @property int|null $unit_id
 * @property string $date
 * @property string $amount
 * @property string $paid
 * @property string $balance
 * @property string|null $note
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Building|null $building
 * @property-read \App\IncomeCategory $cat
 * @property-read \App\Unit|null $unit
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Income newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Income newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Income query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Income whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Income whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Income whereBuildingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Income whereCatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Income whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Income whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Income whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Income whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Income whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Income wherePaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Income whereUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Income whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Income extends Model
{
    protected $guarded = [];


    public function cat()
    {
        return $this->belongsTo(IncomeCategory::class, 'cat_id', 'id');
    }

    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id', 'id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }



}
