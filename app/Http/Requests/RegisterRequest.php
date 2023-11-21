<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Stringable;
use Illuminate\Support\Str;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed'
        ];
    }
    public function sanitized(){
        return
        [
            'slug'=>Str::slug($this->name,'_'),
            'name'=>$this->name,
            'email'=>$this->email,
            'last_name'=>$this->last_name,
            'password'=>password_hash($this->password,PASSWORD_BCRYPT),

        ];
    }
}
