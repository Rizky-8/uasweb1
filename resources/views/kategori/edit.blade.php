@extends('layouts.app')

@section('content')
    <h1>Edit Kategori</h1>
    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama Kategori:</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $kategori->nama }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection