<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        $dataCategory = config('constants.categories');

        foreach ($dataCategory as $value) {
            DB::table('categories')->insert([
                'name' => $value,
                'slug' => Str::slug($value),
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
