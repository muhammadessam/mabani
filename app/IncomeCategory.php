<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\IncomeCategory
 *
 * @property int $id
 * @property string $name
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IncomeCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IncomeCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IncomeCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IncomeCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IncomeCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IncomeCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IncomeCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IncomeCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class IncomeCategory extends Model
{
    protected $guarded = [];
}
