@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Suku Cadang</h1>
    <a href="{{ route('suku_cadang.create') }}" class="btn btn-primary mb-3">Tambah Suku Cadang</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sukuCadangs as $sukuCadang)
            <tr>
                <td>{{ $sukuCadang->id }}</td>
                <td>{{ $sukuCadang->nama }}</td>
                <td>{{ $sukuCadang->deskripsi }}</td>
                <td>
                    <a href="{{ route('suku_cadang.edit', $sukuCadang->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('suku_cadang.destroy', $sukuCadang->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus suku cadang ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection