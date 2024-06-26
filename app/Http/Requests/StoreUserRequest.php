<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    // Determine if the user is authorized to make this request
    public function authorize()
    {
        // Implement your authorization logic
        return true;
    }

    // Get the validation rules that apply to the request
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|unique:users,phone',
            'password' => 'required|string|min:8',
            // Include other fields and rules as necessary
        ];
    }
}
