<?php

namespace Database\Seeders;

use App\Models\Paste;
use Illuminate\Database\Seeder;

class PasteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        if (env('APP_ENV') === 'local') {
            Paste::factory(random_int(20, 40))->create();
        }
    }
}
