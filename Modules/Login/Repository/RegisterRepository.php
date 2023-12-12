<?php

namespace Modules\Login\Repository;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class RegisterRepository
{
    public function checkExists($data)
    {
        return User::where('email', $data['email'])
            ->orWhere('username', $data['username'])->first();
    }

    public function create($data)
    {
        $dataInsert = [
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'created_at' => Carbon::now(),
            'status_id' => 1,
            'role_id' => 1,
        ];

        User::create($dataInsert);
    }
}
