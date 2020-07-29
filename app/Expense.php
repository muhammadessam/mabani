<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Expense
 *
 * @property int $id
 * @property int $cat_id
 * @property int|null $building_id
 * @property int|null $unit_id
 * @property int|null $employee_id
 * @property string $date
 * @property float $amount
 * @property float $paid
 * @property float $balance
 * @property string|null $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Building|null $building
 * @property-read \App\ExpensesCategory $cat
 * @property-read \App\Employee|null $employee
 * @property-read \App\Unit|null $unit
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expense newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expense newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expense query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expense whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expense whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expense whereBuildingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expense whereCatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expense whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expense whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expense whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expense whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expense whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expense wherePaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expense whereUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expense whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Expense extends Model
{
    protected $guarded = [];

    public function cat()
    {
        return $this->belongsTo(ExpensesCategory::class, 'cat_id', 'id');
    }

    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id', 'id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id', 'id');
    }
}
