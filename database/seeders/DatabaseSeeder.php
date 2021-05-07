<?php

namespace Database\Seeders;

use App\Http\Controllers\Api\todoItemController;
use App\Models\role;
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
        // \App\Models\User::factory(10)->create();
        $this->call(roleSeeder::class);
        $this->call(adminUserSeeder::class);
        $this->call(todoItemController::class);


    }
}
