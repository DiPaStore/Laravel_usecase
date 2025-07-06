<form action="{{ route('admin.pesanan.update', $pesanan->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="joki_id">Pilih Joki</label>
    <select name="joki_id" id="joki_id" required>
        <option value="">-- Pilih Joki --</option>
        @foreach ($jokis as $joki)
            <option value="{{ $joki->id }}" {{ $pesanan->joki_id == $joki->id ? 'selected' : '' }}>
                {{ $joki->name }}
            </option>
        @endforeach
    </select>

    <button type="submit">Simpan</button>
</form>
