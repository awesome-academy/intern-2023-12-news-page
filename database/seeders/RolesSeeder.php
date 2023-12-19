<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();

        $dataRoles = config('constants.roles');

        foreach ($dataRoles as $value) {
            DB::table('roles')->insert([
                'name' => $value['name'],
                'slug' => $value['slug'],
                'level' => $value['level'],
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
