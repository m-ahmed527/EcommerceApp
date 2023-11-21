<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CreateOrderRequest extends FormRequest
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
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'sub_total' => 'required',
            'address' => 'required',
            'country' => 'required',
            'state' => 'required',
            'zip' => 'required|max:5',
        ];
    }
    public function sanitizedOrder()
    {
        return [
            'slug' => Str::slug($this->fname, '_'),
            'fname' => $this->fname,
            'lname' => $this->lname,
            'email' => $this->email,
            'sub_total' => $this->sub_total,
            'grand_total' => $this->sub_total,
            'address' => $this->address,
            'country' => $this->country,
            'state' => $this->state,
            'zip' => $this->zip,
            'payment_method'=>'card',
        ];
    }


}
