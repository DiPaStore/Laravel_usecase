@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Buat Pesanan Baru</h1>

    <form action="{{ route('admin.pesanan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="detail" class="form-label">Detail Pesanan</label>
            <textarea name="detail" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.pesanan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
