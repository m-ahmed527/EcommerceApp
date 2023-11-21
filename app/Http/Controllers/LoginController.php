<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Traits\HasAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use HasAuth;

    function loginForm()
    {
        return view('auth.login');
    }

    function login(LoginRequest $request)
    {
        return $this->authenticate($request->sanitized());
    }

    function logout(){
        Auth::logout();
        return redirect(route('login'));
    }
}
