<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
            User::factory(random_int(10, 20))->create();
            User::factory()->create([
                'name' => 'Mike',
                'email' => 'mike@reslar.com',
            ]);
        }
    }
}
