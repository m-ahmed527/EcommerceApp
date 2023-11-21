<?php
namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait HasAuth
{
    public function authenticate($credentials){
        if(Auth::attempt($credentials)){
            Auth::login(Auth::getLastAttempted());
            return redirect(route('index'))->withInput()->with('success', 'Successfully Loged in.');
        }
        return back()->withInput()->with('error', 'Invalid credentials, Please try again.');
    }
}
?>
