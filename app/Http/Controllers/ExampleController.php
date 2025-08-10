<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Example controller showing basic Laravel controller patterns
 */
class ExampleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Example of passing data to a view
        $data = [
            'title' => 'Example Page',
            'items' => ['Item 1', 'Item 2', 'Item 3'],
            'count' => 3
        ];

        return view('example.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('example.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Example validation
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        // In a real application, you would save to database here
        // Example::create($validated);

        return redirect()->route('example.index')
            ->with('success', 'Item created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Example of showing a specific resource
        return view('example.show', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('example.edit', ['id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        // In a real application, you would update the database record here
        // $example = Example::findOrFail($id);
        // $example->update($validated);

        return redirect()->route('example.show', $id)
            ->with('success', 'Item updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // In a real application, you would delete the database record here
        // Example::findOrFail($id)->delete();

        return redirect()->route('example.index')
            ->with('success', 'Item deleted successfully!');
    }
}