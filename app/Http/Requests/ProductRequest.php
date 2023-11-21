<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ProductRequest extends FormRequest
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
            'description'=>'required',
            'image'=>'required|mimes:png,jpg,jepg',
        ];
    }

    public function sanitized(){
        $hashedName= $this->image->hashName();
        $this->image->move(public_path("images/"),$hashedName);
        return[
            'slug'=>Str::slug($this->name),
            'name'=>$this->name,
            'description'=>$this->description,
            'image'=> $hashedName,
        ];
    }
}
