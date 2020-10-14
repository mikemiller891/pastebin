<?php

namespace Tests\Unit;

use App\Models\Paste;
use PHPUnit\Framework\TestCase;

class PasteTest extends TestCase
{
    /**
     * @test
     */
    public function randomly_generated_keys_look_right()
    {
        $key_length = env('PASTE_KEY_LENGTH');
        $key_pattern = '/^[a-z]{'.$key_length.'}$/';
        $key = Paste::generateUniqueKey();
        $this->assertMatchesRegularExpression($key_pattern, $key);
    }
}
