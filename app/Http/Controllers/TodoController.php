<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        return Todo::all();
    }

    // Store a newly created todo in storage
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $todo = Todo::create($validatedData);
        return response()->json($todo, 201);
    }

    // Display the specified resource
    public function show(Todo $todo)
    {
        return $todo;
    }

    // Update the specified todo in storage
    public function update(Request $request, Todo $todo)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $todo->update($validatedData);
        return response()->json($todo);
    }

    // Remove the specified todo from storage (Delete)
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response()->json(null, 204);
    }
}