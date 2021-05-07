<div>
    {{-- The Master doesn't talk, he acts. --}}
    <select name="user" id="user" wire:model="userId">
        <option disabled selected value=0> -- User -- </option>
        @foreach ($users as $userOption)
            <option value="{{$userOption->id}}">{{$userOption->name}}</option>
        @endforeach
    </select>
    <select name="language" id="language" wire:model="language">
            <option value="en">English</option>
            <option value="tr">Turkish</option>
    </select>
    <div class="list-items">
        @foreach ($userTodoLists as $key => $userTodoList)
            <p style="margin-left: 20px">{{$key+1}} - </p>
            @livewire('todo-item', ['itemList' => $userTodoList, 'language' => $language], key($userTodoList->id))
        @endforeach
    </div>
</div>
