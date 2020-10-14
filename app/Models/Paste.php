<?php

namespace App\Models;

use Faker;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static withKey(string $key)
 * @method static withContent(string $content)
 * @property string key
 * @property string content
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
     * @todo Detect key collisions
     *
     * @return string
     */
    public static function generateUniqueKey()
    {
        $faker = Faker\Factory::create();
        $key_length = env('PASTE_KEY_LENGTH');
        $regex = '[a-z]{'.$key_length.'}';
        return $faker->regexify($regex);
    }
}
