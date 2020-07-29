<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Contract
 *
 * @property int $id
 * @property int $unit_id
 * @property int $tenant_id
 * @property string $number
 * @property string $start
 * @property string $end
 * @property string $period
 * @property string $rent
 * @property string $payment_method
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Tenant $tenant
 * @property-read \App\Unit $unit
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract wherePeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereRent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Contract extends Model
{
    protected $guarded = [];

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
    public function tenant(){
        return $this->belongsTo(Tenant::class, 'tenant_id', 'id');
    }
}
