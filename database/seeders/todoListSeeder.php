<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserTodoList;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class todoListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();
        for ($count=0; $count < 3 ; $count++) { 
            $random = Str::random(40);
            
            $todolist = UserTodoList::create([
                'user_id' => $user->id,
            ]);

            $todolist->todo_item()->create([
                'name' => $random,
                'language' => 'en'
            ]);
            
        }
    }
}
