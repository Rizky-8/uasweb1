@extends('layouts.app')

@section('content')
    <h1>Edit Transaksi</h1>
    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="pemasok_id">ID Pemasok:</label>
            <input type="text" name="pemasok_id" id="pemasok_id" class="form-control" value="{{ $transaksi->pemasok_id }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $transaksi->tanggal }}" required>
        </div>
        <div class="form-group">
            <label for="total">Total:</label>
            <input type="number" name="total" id="total" class="form-control" value="{{ $transaksi->total }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection