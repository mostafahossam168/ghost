<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplyCouponRequest extends FormRequest
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
            'code' => 'required|string|exists:coupons,code',
            // Include other fields and rules as necessary
        ];
    }
}
