<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteServiceRequest extends FormRequest
{
    public function authorize()
    {
        // Add logic to determine if the user is authorized to delete the service
        return true;
    }

    public function rules()
    {
        // Usually, no rules are needed to delete, but you may want to check if the service exists
        return [];
    }
}
