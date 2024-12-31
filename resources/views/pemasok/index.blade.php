@extends('layouts.app')

@section('content')
    <h1>Daftar Pemasok</h1>
    <a href="{{ route('pemasok.create') }}" class="btn btn-primary">Tambah Pemasok</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pemasok</th>
                <th>Kontak</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pemasoks as $pemasok)
                <tr>
                    <td>{{ $pemasok->id }}</td>
                    <td>{{ $pemasok->nama }}</td>
                    <td>{{ $pemasok->kontak }}</td>
                    <td>
                        <a href="{{ route('pemasok.edit', $pemasok->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('pemasok.destroy', $pemasok->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection