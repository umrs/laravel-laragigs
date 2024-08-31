<?php

namespace App\Http\Controllers;

use App\Models\PersonalAccessToken;
use Illuminate\Http\Request;

class TokensController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tokens.index', ['tokens' => PersonalAccessToken::owner()->latest()->get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        auth()->user()->createToken('main');

        return redirect()->route('tokens.index')->with('message', 'Token created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PersonalAccessToken $token)
    {
        if ($token->tokenable_id != auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $token->delete();
        return redirect()->route('tokens.index')->with('message', 'Token deleted successfully!');
    }
}
