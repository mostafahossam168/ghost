<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Authorization logic goes here.
        // For now, let's assume all users are authorized to make this request.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'service_id' => 'required|exists:services,id',
            'user_id' => 'required|exists:users,id',
            'scheduled_date' => 'required|date|after_or_equal:today',
            // Add any other fields and validation rules you need.
        ];
    }
}
