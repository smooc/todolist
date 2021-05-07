<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class usersController extends Controller
{
    public function index(){
        $users = User::where('id','!=',Auth::user()->id)->get();
        return view('users', compact('users'));
    }
}
