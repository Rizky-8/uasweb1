@extends('layouts.app')

@section('content')
    <h1>Edit Pemasok</h1>
    <form action="{{ route('pemasok.update', $pemasok->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama Pemasok:</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $pemasok->nama }}" required>
        </div>
        <div class="form-group">
            <label for="kontak">Kontak:</label>
            <input type="text" name="kontak" id="kontak" class="form-control" value="{{ $pemasok->kontak }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection