<?php

namespace Database\Seeders;

use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'SUPER ADMIN',
            'username' => 'admin',
            'password' => bcrypt('password'),
            'role' => 'SA',
        ]);
        User::create([
            'name' => 'ADMIN',
            'username' => 'adminprsu',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);
    }
}
