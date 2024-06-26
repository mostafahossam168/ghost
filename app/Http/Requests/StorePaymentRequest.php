<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
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
            'card_number' => 'required|digits:16',
            'expiry_month' => 'required|digits:2',
            'expiry_year' => 'required|digits:4',
            'cvv' => 'required|digits:3',
            'amount' => 'required|numeric|min:0.01',
            // Include other fields and rules as necessary
        ];
    }
}
