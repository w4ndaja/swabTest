<?php

namespace Database\Seeders;

use App\Models\Doctor;
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
            'name' => 'Operator',
            'username' => 'operator',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);
        Doctor::create([
            'name' => 'dr. Yuliandriani Wannur Azah'
        ]);
    }
}
