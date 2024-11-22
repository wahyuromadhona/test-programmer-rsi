<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoList;

class TodoListController extends Controller
{
    public function index()
    {
        $todos = TodoList::all();
        return view('todo.index', compact('todos'));
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'todo' => 'required|string|max:30',
            'tanggal' => 'required|date',
            'jam' => 'required|date_format:H:i',
            'status' => 'required|in:Belum,Sedang,Sudah',
        ]);

        TodoList::create([
            'todo' => $request->todo,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'status' => $request->status,
        ]);

        return redirect()->route('todo.index')->with('success', 'Todo berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $todo = TodoList::findOrFail($id);
        return view('todo.edit', compact('todo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'todo' => 'required|string|max:30',
            'tanggal' => 'required|date',
            'jam' => 'required|date_format:H:i',
            'status' => 'required|in:Belum,Sedang,Sudah',
        ]);

        $todo = TodoList::findOrFail($id);
        $todo->update([
            'todo' => $request->todo,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'status' => $request->status,
        ]);

        return redirect()->route('todo.index')->with('success', 'Todo berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $todo = TodoList::findOrFail($id);
        $todo->delete();

        return redirect()->route('todo.index')->with('success', 'Todo berhasil dihapus!');
    }
}

