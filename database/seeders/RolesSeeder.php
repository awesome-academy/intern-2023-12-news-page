<?php

namespace Database\Seeders;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonPath = base_path('database/json/roles.json');
        $dataRoles = json_decode(File::get($jsonPath), true);

        foreach ($dataRoles as $value) {
            $dataInsert = [
                'name' => $value['name'],
                'slug' => $value['slug'],
                'level' => $value['level'],
                'created_at' => Carbon::now(),
            ];
            Role::create($dataInsert);
        }
    }
}
