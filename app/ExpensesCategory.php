<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ExpensesCategory
 *
 * @property int $id
 * @property string $name
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpensesCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpensesCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpensesCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpensesCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpensesCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpensesCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpensesCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpensesCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ExpensesCategory extends Model
{
    protected $guarded = [];

}
