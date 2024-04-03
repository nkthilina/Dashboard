<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TodoController extends Controller
{
    // public function index(){
    //     return Inertia::render('Todos/Index',[
    //         'todos' => Todo::all()
    //     ]);
    // }

    public function index(){
        return Inertia::render('Todos/Index',[
            'todos' => Todo::all()->map(function($todo){
                return [
                    'id' => $todo->id,
                    'name' => $todo->name,
                    'age' => $todo->age,
                    'image' => asset('storage/'. $todo->image)
                ];
            })
        ]);
    }

    public function create(){
        return Inertia::render('Todos/Create');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'age' => 'required|integer|min:18',
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif'
    //     ]);

    //         $image = $request->file('image')->store('Todos', 'public');

    //     Todo::create([
    //         'name' => $request->name,
    //         'age' => $request->age,
    //         'image' => $image,
    //     ]);

    //     return Redirect::route('todos.index');
    // }

    public function store(Request $request)
{
    $image = $request->file('image')->store('todos', 'public');

    Todo::create([
        'name' => $request->input('name'),
        'age' => $request->input('age'),
        'image' => $image
    ]);

    return Redirect::route('todos.index');
}
}
