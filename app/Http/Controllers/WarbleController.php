<?php

namespace App\Http\Controllers;

use App\Models\Warble;
use Illuminate\Http\Request;

class WarbleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $warbles = Warble::with('user')
            ->latest()
            ->take(50) // Limit to 50 most recent warbles
            ->get();

        return view('home', ['warbles' => $warbles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ], [
            'message.required' => 'Please write something to warble!',
            'message.max' => 'Warble must be 255 characters or less.'
        ]);

        Warble::create([
            'message' => $validated['message'],
            'user_id' => null,
        ]);

        return redirect('/')->with('success', 'Your warble has been posted!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Warble $warble)
    {
        return view('warbles.edit', compact('warble'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Warble $warble)
    {
        // Validate
        $validated = $request->validate([
            'message' => ['required', 'string', 'max:255']
        ]);

        // Update
        $warble->update($validated);

        return redirect('/')->with('success', 'Warble updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warble $warble)
    {
        $warble->delete();

        return redirect('/')->with('success', 'Warble deleted!');
    }
}
