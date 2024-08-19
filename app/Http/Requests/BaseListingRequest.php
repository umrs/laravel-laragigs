<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseListingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:255'],
            'company' => ['required', 'max:255'],
            'location' => ['required', 'max:255'],
            'website' => ['required', 'url'],
            'email' => ['required', 'email'],
            'tags' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
        ];
    }
}
