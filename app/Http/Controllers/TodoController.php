<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::orderBy('end_date', 'desc')->get();
        return response()->json($todos);
    }

    public function store(Request $request)
    {
        $todo = new Todo();
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->end_date = $request->end_date;
        $todo->save();

        return response()->json($todo);
    }

    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->end_date = $request->end_date;
        $todo->save();

        return response()->json($todo);
    }

    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();

        return response()->json('Todo deleted successfully');
    }
}
