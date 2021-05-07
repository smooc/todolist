<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\UserTodoList;
use Livewire\Component;

class TodoList extends Component
{
    public $users, $userId = 0, $userTodoLists = [], $language = "en";


  
    public function mount($users){
        $this->users = $users;
    }
    public function render()
    {
        return view('livewire.todo-list');
    }
    public function updatedUserId(){
        $user = User::find($this->userId);
        if($user->UserTodoList){
            $this->userTodoLists = $user->UserTodoList;
        }
    }

    public function updatedLanguage(){
        $this->emit('changeLanguage', $this->language);
    }
}