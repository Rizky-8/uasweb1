@extends('layouts.app')

@section('content')
    <h1>Tambah Pemasok</h1>
    <form action="{{ route('pemasok.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Pemasok:</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="kontak">Kontak:</label>
            <input type="text" name="kontak" id="kontak" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
@endsection