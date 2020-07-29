<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Document
 *
 * @property int $id
 * @property string $name
 * @property string|null $note
 * @property string $expire_day
 * @property float|null $remind_me
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereExpireDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereRemindMe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Document extends Model
{
    protected $guarded = [];
}
