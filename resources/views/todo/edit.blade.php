@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Todo</h1>
        <form action="{{ route('todo.update', $todo->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="todo">Todo</label>
                <input type="text" class="form-control" id="todo" name="todo" value="{{ $todo->todo }}" required>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $todo->tanggal }}" required>
            </div>
            <div class="form-group">
                <label for="jam">Jam</label>
                <input type="time" class="form-control" id="jam" name="jam" value="{{ $todo->jam }}" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Belum" {{ $todo->status == 'Belum' ? 'selected' : '' }}>Belum</option>
                    <option value="Sedang" {{ $todo->status == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                    <option value="Sudah" {{ $todo->status == 'Sudah' ? 'selected' : '' }}>Sudah</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection


