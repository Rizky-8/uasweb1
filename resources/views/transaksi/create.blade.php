@extends('layouts.app')

@section('content')
    <h1>Tambah Transaksi</h1>
    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="pemasok_id">ID Pemasok:</label>
            <input type="text" name="pemasok_id" id="pemasok_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="total">Total:</label>
            <input type="number" name="total" id="total" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
@endsection