<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {
        if(Auth::user()->user_role->role->title == "Admin"){
            return $request->wantsJson() ? response()->json(['two_factor' => false]) : redirect()->intended('/dashboard');
        }
        return $request->wantsJson() ? response()->json(['two_factor' => false]) : redirect()->intended(config('fortify.home'));
    }

}