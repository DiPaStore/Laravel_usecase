@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Pesanan</h2>

    <form action="{{ route('pesanans.update', $pesanan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ $pesanan->harga }}" required>
        </div>

        <div class="mb-3">
            <label for="detail" class="form-label">Detail</label>
            <textarea name="detail" class="form-control" rows="4" required>{{ $pesanan->detail }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pesanans.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
