<?php

namespace App\Models;

use Faker;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Paste
 *
 * @property string $key
 * @property string $content
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Paste newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Paste newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Paste query()
 * @method static \Illuminate\Database\Eloquent\Builder|Paste whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paste whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paste whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paste whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paste whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paste withContent($content)
 * @method static \Illuminate\Database\Eloquent\Builder|Paste withKey($key)
 * @mixin \Eloquent
 */
class Paste extends Model
{
    use HasFactory;

    /**
     * Find the paste with the specified key.
     *
     * @param $query
     * @param $key
     * @return mixed
     */
    public static function scopeWithKey($query, $key)
    {
        return $query->where('key', $key);
    }

    /**
     * Find the paste with the specified content.
     *
     * @param $query
     * @param $content
     * @return mixed
     */
    public static function scopeWithContent($query, $content)
    {
        return $query->where('content', $content);
    }

    /**
     * Generate a random alpha string for use as a unique key.
     * Key collisions are not detected at this time.
     *
     * @return string
     * @todo Detect key collisions
     *
     */
    public static function generateUniqueKey(): string
    {
        $faker = Faker\Factory::create();
        $key_length = env('PASTE_KEY_LENGTH');
        $regex = '[a-z]{' . $key_length . '}';
        return $faker->regexify($regex);
    }
}
