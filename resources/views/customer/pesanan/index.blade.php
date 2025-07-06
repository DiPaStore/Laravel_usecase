<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pesanan Saya</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap');

        body {
            background-color: #0d0d0d;
            font-family: 'Orbitron', sans-serif;
            color: #00f0ff;
            margin: 0;
            padding: 0;
            background-image: radial-gradient(circle at top left, #111, #000);
        }

        .navbar {
            background: #111;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 0 10px #00f0ff;
        }

        .navbar .logo {
            font-size: 20px;
            font-weight: bold;
        }

        .navbar a {
            color: #00f0ff;
            text-decoration: none;
            margin: 0 10px;
            font-size: 14px;
        }

        .logout-btn {
            background-color: transparent;
            border: 2px solid #ff4b5c;
            color: #ff4b5c;
            padding: 8px 16px;
            border-radius: 5px;
            font-family: inherit;
            cursor: pointer;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background-color: #ff4b5c;
            color: white;
        }

        .container {
            padding: 40px 20px;
            text-align: center;
        }

        .title {
            font-size: 28px;
            margin-bottom: 30px;
        }

        .table-wrapper {
            max-width: 1000px;
            margin: 0 auto;
            background: #1a1a1a;
            border: 2px solid #00f0ff;
            box-shadow: 0 0 20px #00f0ff;
            border-radius: 15px;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #333;
            color: #00f0ff;
        }

        th {
            background-color: #0d0d0d;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 13px;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .no-data {
            color: #ccc;
            padding: 20px;
            font-style: italic;
        }

        .action-btn {
            color: #00f0ff;
            text-decoration: underline;
            font-size: 13px;
        }

        .create-btn {
            margin-bottom: 20px;
            display: inline-block;
            background-color: #00f0ff;
            color: #000;
            padding: 10px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .create-btn:hover {
            background-color: #00c4cc;
            box-shadow: 0 0 10px #00f0ff;
        }

        .delete-btn {
    background-color: transparent;
    border: 2px solid #00f0ff;
    color: #00f0ff;
    padding: 6px 12px;
    border-radius: 6px;
    font-family: 'Orbitron', sans-serif;
    font-size: 13px;
    cursor: pointer;
    transition: 0.3s;
    box-shadow: 0 0 5px #00f0ff;
}

.delete-btn:hover {
    background-color: #00f0ff;
    color: #000;
    box-shadow: 0 0 15px #00f0ff;
}


        
    </style>
</head>
<body>

<div class="navbar">
    <div class="logo">🎮 JokiGame</div>
    <div class="menu">
        <a href="{{ route('dashboard') }}">🏠 Dashboard</a>
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</div>

<div class="container">
    <h1 class="title">📦 Pesanan Saya</h1>

    <a href="{{ route('customer.pesanan.create') }}" class="create-btn">+ Buat Pesanan Baru</a>
    

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Detail</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pesanans as $pesanan)
                    <tr>
                        <td>{{ $pesanan->id }}</td>
                        <td>{{ $pesanan->detail }}</td>
                        <td>Rp {{ number_format($pesanan->harga, 0, ',', '.') }}</td>
                        <td>{{ $pesanan->status }}</td>
                        <td>{{ $pesanan->created_at->format('Y-m-d') }}</td>
                        
                       <td>
    <div style="display: flex; gap: 10px; justify-content: center;">
        <a href="{{ route('customer.pesanan.edit', $pesanan->id) }}" class="create-btn" style="padding:6px 12px;">✏️ Edit</a>

        <a href="{{ route('customer.pembayaran.create', $pesanan->id) }}" class="create-btn" style="padding:6px 12px;">💸 Bayar</a>


        <form method="POST" action="{{ route('customer.pesanan.destroy', $pesanan->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-btn">🗑️ Hapus</button>
        </form>

        
    </div>
</td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="no-data">Belum ada pesanan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
