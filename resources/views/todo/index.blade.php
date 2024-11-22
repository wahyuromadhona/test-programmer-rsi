@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Todo List</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('todo.create') }}" class="btn btn-primary">Tambah Todo</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Todo</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($todos as $todo)
                    <tr>
                        <td>{{ $todo->id }}</td>
                        <td>{{ $todo->todo }}</td>
                        <td>{{ $todo->tanggal }}</td>
                        <td>{{ $todo->jam }}</td>
                        <td>{{ $todo->status }}</td>
                        <td>
                            <a href="{{ route('todo.edit', $todo->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('todo.destroy', $todo->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

