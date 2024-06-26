<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Authorization logic goes here.
        // For example, you may check if the user is authenticated or if they own the booking.
        return true; // Update this according to your auth logic.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // Define your validation rules here
            // Example:
            'service_id' => 'required|exists:services,id',
            'scheduled_date' => 'required|date|after_or_equal:today',
            // Add any other fields and rules as per your update requirements.
        ];
    }
}
