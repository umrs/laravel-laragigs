<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingsController extends Controller
{
    public function index(Request $request) {
        return view('listings.index', [
            'listings' => Listing::latest()
                ->filterTag($request->tag)
                ->filterSearch($request->search)
                ->paginate(20)
                ->withQueryString()
        ]);
    }

    public function show(Listing $listing) {
        return view('listings.show', ['listing' => $listing]);
    }

    public function create() {
        return view('listings.create');
    }

    public function store(Request $request) {
        $formData = $request->validate([
                                           'title' => ['required', 'max:255'],
                                           'company' => ['required', 'max:255'],
                                           'location' => ['required', 'max:255'],
                                           'website' => ['required', 'url'],
                                           'email' => ['required', 'email'],
                                           'tags' => ['required', 'max:255'],
                                           'description' => ['required', 'max:255'],
                                       ]);

        $listing = Listing::create($formData);

        return redirect()->route('listings.show', ['listing' => $listing])->with('message', 'Listing created successfully!');
    }
}
