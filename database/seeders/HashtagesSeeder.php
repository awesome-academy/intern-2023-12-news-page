<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HashtagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hashtags')->truncate();

        $dataCategory = config('constants.hashtags');

        foreach ($dataCategory as $value) {
            DB::table('hashtags')->insert([
                'name' => $value,
                'slug' => Str::slug($value),
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
