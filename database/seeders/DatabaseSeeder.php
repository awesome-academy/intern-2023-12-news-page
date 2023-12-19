<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        User::factory(10)->create();
        DB::table('users')->insert([
            'name' => 'Admin 1',
            'email' => 'test1@gmail.com',
            'password' => Hash::make('123'),
        ]);
    }
}
