<?php

namespace App\Http\Requests;

use App\Models\Listing;

class UpdateListingRequest extends BaseListingRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
//        return auth()->user()->can('update', Listing::class);
        $listing = $this->route('listing');
        return $listing && auth()->user()?->id === $listing->user_id;
    }
}
