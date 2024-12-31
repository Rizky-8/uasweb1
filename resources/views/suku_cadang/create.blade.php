@extends('layouts.app')

@section('content')
    <h1>Tambah Suku Cadang</h1>
    <form action="{{ route('suku_cadang.store') }}" method="POST">
        @csrf
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" required>
        <button type="submit">Simpan</button>
    </form>
@endsection