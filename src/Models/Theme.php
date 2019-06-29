<?php

namespace Digitalcloud\NovaTheme\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Theme
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property bool|null $default
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Theme newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Theme newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Theme query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Theme whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Theme whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Theme whereDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Theme whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Theme whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Theme whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Theme extends Model
{
    use SoftDeletes;

    protected $fillable = ["name", "code", "default"];

    protected $casts = [
        "default"
    ];

    /**
     * @return self
     */
    public static function getDefaultTheme()
    {
        return Theme::whereDefault(true)->first();
    }
}
