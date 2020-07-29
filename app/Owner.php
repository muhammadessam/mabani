<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Owner
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Building[] $buildings
 * @property-read int|null $buildings_count
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Owner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Owner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Owner query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Owner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Owner whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Owner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Owner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Owner whereUserId($value)
 * @mixin \Eloquent
 */
class Owner extends Model
{

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function buildings()
    {
        return $this->belongsToMany(Building::class, 'buildings_owners', 'owner_id', 'building_id')->withPivot('percentage');
    }
}
