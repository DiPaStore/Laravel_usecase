@extends('layouts.app')

@section('content')
    <h1>Daftar Pesanan Admin</h1>
    <ul>
        @foreach($pesanans as $pesanan)
            <li>{{ $pesanan->detail }} - Rp{{ $pesanan->harga }}</li>
        @endforeach
    </ul>
    <td>{{ $pesanan->user->name ?? 'Tanpa Nama' }}</td>
<td>{{ $pesanan->detail }}</td>
<td>{{ $pesanan->harga }}</td>
<td>{{ $pesanan->status }}</td>

@endsection
