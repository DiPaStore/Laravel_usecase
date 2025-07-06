@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Pesanan Saya</h2>

    <a href="{{ route('pesanans.create') }}" class="btn btn-primary mb-3">+ Buat Pesanan</a>

    @if($pesanans->count() > 0)
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Detail</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pesanans as $index => $pesanan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>Rp {{ number_format($pesanan->harga) }}</td>
                    <td>{{ ucfirst($pesanan->status) }}</td>
                    <td>{{ $pesanan->detail }}</td>
                    <td>
                        <a href="{{ route('pesanans.edit', $pesanan->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <!-- Tombol hapus bisa ditambahkan di sini jika kamu sudah buat -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">Belum ada pesanan.</div>
    @endif
</div>
@endsection
