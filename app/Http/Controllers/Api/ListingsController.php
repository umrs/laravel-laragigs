<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;
use App\Http\Resources\Listings as ListingsResourcesCollection;
use App\Http\Resources\ListingsResource;
use App\Models\Listing;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): ListingsResourcesCollection
    {
        return new ListingsResourcesCollection(Listing::latest()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreListingRequest $request): ListingsResource
    {
        $attributes = $request->validated();
        $attributes['user_id'] = auth()->id();
        $record = Listing::create($attributes);

        return new ListingsResource($record);
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing): ListingsResource
    {
        return new ListingsResource($listing);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateListingRequest $request, Listing $listing): ListingsResource
    {
        $listing->update($request->validated());
        return new ListingsResource($listing);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing): Response
    {
        if (!auth()->user() || auth()->user()->id != $listing->user_id) {
            throw new AccessDeniedHttpException('This action is unauthorized.');
        }

        $listing->delete();
        return response()->noContent();
    }
}
