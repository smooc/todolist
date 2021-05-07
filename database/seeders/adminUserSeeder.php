<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\user_role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class adminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => env('ADMIN_USER_NAME'),
            'email' => env('ADMIN_USER_EMAIL'),
            'password' => Hash::make(env('ADMIN_USER_PASSWORD')),
        ]);

        user_role::create([
            'user_id' => $user->id,
            'role_id' => 1
        ]);
    
    }
}
