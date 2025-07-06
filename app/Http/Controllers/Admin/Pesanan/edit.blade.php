@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Pesanan</h1>

    <form action="{{ route('admin.pesanan.update', $pesanan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="detail" class="form-label">Detail Pesanan</label>
            <textarea name="detail" class="form-control" required>{{ $pesanan->detail }}</textarea>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ $pesanan->harga }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.pesanan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
