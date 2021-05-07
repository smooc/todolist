<?php

namespace App\Http\Livewire;

use App\Models\TodoItem as TodoItemModel;
use App\Models\User;
use Livewire\Component;

class TodoItem extends Component
{
    public $itemList, $item, $language, $itemName, $itemCompleted;
    protected $listeners = ['changeLanguage' => 'changeLanguage'];

    protected $rules = [
        'item.name' => 'required|string',
    ];


    public function mount($itemList,$language){
        $this->itemList = $itemList;
        $this->itemCompleted = $this->itemList->completed;
        $this->language = $language;
        $this->item = $itemList->todoItem->where('language' , $language)->first();

    }
    public function render()
    {
        return view('livewire.todo-item');
    }
    public function changeLanguage($newLanguage){
        $this->language = $newLanguage;
        $this->item = $this->itemList->todoItem->where('language' , $newLanguage)->first();
        if(!$this->item){
            $this->item = $this->itemList->todoItem()->create([
                'name' => 'New Item language',
                'language' => $newLanguage,
            ]);
        }
    }

    public function updated(){
        $this->itemList->completed = $this->itemCompleted;
        $this->itemList->updated_at = now();
        $this->itemList->save();
        dd($this->item->name);
        if(!$this->item){
            $this->item = $this->itemList->todoItem->first();
           // $this->item = 
        }
        $this->item->save();
    }
}
