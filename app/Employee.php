<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Employee
 *
 * @property int $id
 * @property int $user_id
 * @property float $salary
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee whereSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee whereUserId($value)
 * @mixin \Eloquent
 */
class Employee extends Model
{

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


}
