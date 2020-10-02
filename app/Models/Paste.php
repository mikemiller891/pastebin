<?php

namespace App\Models;

use Faker;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static withKey($key)
 * @method static withContent(string $content)
 *
 * @property string key
 * @property string content
 */
class Paste extends Model
{
    use HasFactory;

    public static function generateUniqueKey()
    {
        $faker = Faker\Factory::create();

        return $faker->regexify(env('PASTE_KEY_PATTERN'));
    }

    public function scopeWithKey($query, $key)
    {
        return $query->where('key', $key);
    }

    public function scopeWithContent($query, $content)
    {
        return $query->where('content', $content);
    }
}
