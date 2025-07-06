@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Buat Pesanan Baru</h2>

    <form action="{{ route('pesanan.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="detail" class="block font-semibold">Detail Pesanan</label>
            <textarea name="detail" id="detail" class="w-full p-2 border rounded" required></textarea>
        </div>
        <div class="mb-4">
            <label for="harga" class="block font-semibold">Harga</label>
            <input type="number" name="harga" id="harga" class="w-full p-2 border rounded" required>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Buat Pesanan</button>
    </form>
</div>
@endsection
