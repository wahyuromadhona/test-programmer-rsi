@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Todo</h1>
        <form action="{{ route('todo.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="todo">Todo</label>
                <input type="text" class="form-control" id="todo" name="todo" value="{{ old('todo') }}" required>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
            </div>
            <div class="form-group">
                <label for="jam">Jam</label>
                <input type="time" class="form-control" id="jam" name="jam" value="{{ old('jam') }}" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Belum" {{ old('status') == 'Belum' ? 'selected' : '' }}>Belum</option>
                    <option value="Sedang" {{ old('status') == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                    <option value="Sudah" {{ old('status') == 'Sudah' ? 'selected' : '' }}>Sudah</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection

