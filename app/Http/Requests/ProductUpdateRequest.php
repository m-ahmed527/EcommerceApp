<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ProductUpdateRequest extends FormRequest
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
            'image'=>'sometimes|required|mimes:png,jpg,jpeg',
        ];
    }

    public function sanitized(){

        return
        [
            'slug'=>Str::slug($this->name),
            'name'=>$this->name,
            'description'=>$this->description,
        ];
    }

}
