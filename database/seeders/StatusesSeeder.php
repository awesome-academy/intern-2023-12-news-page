<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->truncate();

        $dataStatuses = config('constants.statuses');

        foreach ($dataStatuses as $value) {
            DB::table('statuses')->insert([
                'name' => $value['name'],
                'slug' => $value['slug'],
                'type' => $value['type'],
                'reason' => $value['reason'],
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
