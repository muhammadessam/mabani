<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Setting
 *
 * @property int $id
 * @property string|null $logo
 * @property string|null $header
 * @property string|null $footer
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $stamp
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereFooter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereHeader($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereStamp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Setting extends Model
{
    protected $guarded = [];

    public static function MainSettings(){
        return Setting::all()->first();
    }
}
