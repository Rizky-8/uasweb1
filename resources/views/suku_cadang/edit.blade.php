@extends('layouts.app')

@section('content')
    <h1>Edit Suku Cadang</h1>
    <form action="{{ route('suku_cadang.update', $sukuCadang->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" value="{{ $sukuCadang->nama }}" required>
        <button type="submit">Update</button>
    </form>
@endsection