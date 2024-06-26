<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $this->user()->id,
            'phone' => 'sometimes|string|unique:users,phone,' . $this->user()->id,
            // Include other fields and rules as necessary
        ];
    }
}
