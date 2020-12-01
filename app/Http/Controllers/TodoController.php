<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function index()
    {

        $todos=Todo::orderBy('created_at','desc')->paginate(5);
        return view('dashboard',[
            'todos' =>$todos,
        ]);
    }

    public function store(TodoRequest $request)
    {
        $todo = new Todo();
        $todo->title = $request['title'];
        $todo->user_id = Auth::user()->id;
        $todo->description = $request['description'];
        $todo->location = $request['location'];
        $todo->save();

        return redirect()->back()->with('status', 'Task Created Successfully!');
    }

    public function update(TodoRequest $request, $id)
    {

        $todo = Todo::findOrFail($id);
        $todo->title = $request['title'];
        $todo->user_id = Auth::user()->id;
        $todo->description = $request['description'];
        $todo->location = $request['location'];
        $todo->save();

        return redirect()->back()->with('status', 'Task Updated Successfully!');

    }

    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return redirect()->back()->with('status', 'Task Deleted Successfully!');
    }
}
