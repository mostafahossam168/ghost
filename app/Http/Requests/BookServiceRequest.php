<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * You may want to check if the user is authenticated or has a specific role.
     */
    public function authorize(): bool
    {
        // Assuming all authenticated users can book a service.
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'service_id' => [
                'required',
                Rule::exists('services', 'id'), // Ensure the service exists.
            ],
            'user_id' => [
                'required',
                Rule::exists('users', 'id'), // Ensure the user exists.
            ],
            'scheduled_date' => [
                'required',
                'date',
                'after_or_equal:today', // The date must be today or in the future.
            ],
            // Add other booking-related fields and rules here.
        ];
    }
}
