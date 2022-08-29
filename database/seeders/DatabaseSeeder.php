<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Item;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
                    'name' => "doni",
                    'email' => "doni@gmail.com",
                    'password' => bcrypt('12345')
                ]);

        Item::factory(4)->create();
    }
}
