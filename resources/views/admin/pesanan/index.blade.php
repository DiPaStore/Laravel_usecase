<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kelola Pesanan</title>
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
            font-size: 32px;
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
    </style>
</head>
<body>

<div class="navbar">
    <div class="logo">🎮 Admin Panel</div>
    <div class="menu">
        <a href="{{ route('admin.dashboard') }}">🏠 Dashboard</a>
        <a href="{{ route('admin.joki.index') }}">🧑‍💻 Tugas Joki</a>
        <a href="{{ route('admin.pembayaran.index') }}">💰 Pembayaran</a>
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</div>

<div class="container">
    <h1 class="title">📦 Kelola Pesanan</h1>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Detail</th>
                    <th>Status</th>
                    <th>Harga</th>
                    <th>Tanggal</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse($pesanans as $pesanan)
                    <tr>
                        <td>{{ $pesanan->id }}</td>
                        <td>{{ $pesanan->user->name ?? 'N/A' }}</td>
                        <td>{{ $pesanan->detail }}</td>
                        <td>{{ $pesanan->status }}</td>
                        <td>{{ $pesanan->harga }}</td>
                        <td>{{ $pesanan->created_at->format('Y-m-d') }}</td>
                       
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="no-data">Belum ada pesanan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
