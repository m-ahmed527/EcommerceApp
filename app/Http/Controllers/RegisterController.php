<?php

namespace App\Http\Controllers;

use App\Events\UserRegister;
use App\Http\Requests\RegisterRequest;
use App\Mail\UserWelcomMail;
use App\Models\User;
use App\Traits\HasAuth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    use HasAuth;
    function registerForm()
    {
        return view('auth.register');
    }

    function register(RegisterRequest $request)
    {
        $user = User::create($request->sanitized());

        if ($user) {
            event(new UserRegister($user));
            // dd($user->email);
            
            $this->authenticate(['email' => $request->email, 'password' => $request->password]);
            return redirect(route('index'))->withInput()->with('success', 'Registration Successfull.');
        }
    }
}
