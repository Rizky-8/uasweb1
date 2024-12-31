@extends('layouts.app')

@section('content')
<div class="container">
    <header>
        <h1>Welcome to the Dashboard</h1>
    </header>

    @auth
        @if(auth()->user()->isAdmin())
            <h2>Admin Access</h2>
            <p>As an admin, you can manage the following:</p>
            <ul>
                <li><a href="{{ route('suku_cadang.index') }}">Suku Cadang</a></li>
                <li><a href="{{ route('kategori.index') }}">Kategori</a></li>
                <li><a href="{{ route('pemasok.index') }}">Pemasok</a></li>
            </ul>
        @elseif(auth()->user()->isOperator())
            <h2>Operator Access</h2>
            <p>As an operator, you can manage the following:</p>
            <ul>
                <li><a href="{{ route('transaksi.index') }}">Transaksi</a></li>
            </ul>
        @endif

        <!-- Contoh Tabel -->
        <h3>Data Tabel</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Level</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->level }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Please log in to access your dashboard.</p>
    @endauth

    <footer>
        <p>&copy; {{ date('Y') }} Your Company Name. All rights reserved.</p>
    </footer>
</div>
@endsection