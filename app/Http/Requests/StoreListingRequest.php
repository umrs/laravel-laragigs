<?php

namespace App\Http\Requests;

class StoreListingRequest extends BaseListingRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return (bool) auth()->user();
    }
}
