<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Tenant
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Contract[] $contracts
 * @property-read int|null $contracts_count
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tenant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tenant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tenant query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tenant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tenant whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tenant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tenant whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tenant whereUserId($value)
 * @mixin \Eloquent
 */
class Tenant extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class, 'tenant_id', 'id');
    }

}
