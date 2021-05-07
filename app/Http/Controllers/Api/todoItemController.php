<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Models\TodoItem;
use App\Models\User;
use App\Models\UserTodoList;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;


class todoItemController extends Controller
{
    public function todoList(Request $request){
        $user = $this->authUser();
        if(!$user){
            return response()->json(['error', 'unauthorized']);
        }
        $todoLists = $user->UserTodoList()->with('todoItem')->get();
        return $todoLists;
    }
    public function store(Request $request){
        $user = $this->authUser();
        if(!$user){
            return response()->json(['error' => 'unauthorized']);
        }
        $details = $request->only(['name','language']);
        $todoList = $user->UserTodoList()->create();
        $todoList->todoItem()->create($details);
        return response()->json(['message' => 'todo Item created successfully']);
    }
    
    public function update(Request $request){
        $user = $this->authUser();
        if(!$user){
            return response()->json(['error' => 'unauthorized']);
        }
       
        $userTodoList = UserTodoList::findOrFail($request->list_id);
        $userTodoList->completed = filter_var($request->completed, FILTER_VALIDATE_BOOLEAN);
        $userTodoList->save();
        return response()->json(['message' => 'successfully updated the record']);
    }
    public function destroy(Request $request){
        $user = $this->authUser();
        if(!$user){
            return response()->json(['error' => 'unauthorized']);
        }
        $userTodoList = UserTodoList::findOrFail($request->list_id);
        $userTodoList->delete();
        return response()->json(['message' => 'Removed the item successfully']);


    }
}
