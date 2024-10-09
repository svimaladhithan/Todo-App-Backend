<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // Display a listing of the resource (Read)
    public function index()
    {
        return Todo::all(); // Fetch all TODOs
    }

    // Store a newly created resource in storage (Create)
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $todo = Todo::create($validatedData);
        return response()->json($todo, 201);
    }

    // Display the specified resource (Read one)
    public function show(Todo $todo)
    {
        return $todo;
    }

    // Update the specified resource in storage (Update)
    public function update(Request $request, Todo $todo)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $todo->update($validatedData);
        return response()->json($todo);
    }

    // Remove the specified resource from storage (Delete)
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response()->json(null, 204);
    }
}