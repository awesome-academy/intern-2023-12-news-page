<?php

namespace Database\Seeders;

use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonPath = base_path('database/json/statuses.json');
        $dataStatuses = json_decode(File::get($jsonPath), true);

        foreach ($dataStatuses as $value) {
            $dataInsert = [
                'name' => $value['name'],
                'slug' => $value['slug'],
                'type' => $value['type'],
                'reason' => $value['reason'],
                'created_at' => Carbon::now(),
            ];
            Status::create($dataInsert);
        }
    }
}
