<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kelola Tugas Joki</title>
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
            color: #00f0ff;
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
            color: #00f0ff;
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

        select, button {
            padding: 6px 10px;
            font-family: inherit;
            font-size: 13px;
            background: #0d0d0d;
            border: 1px solid #00f0ff;
            color: #00f0ff;
            border-radius: 5px;
            margin: 5px 0;
        }

        button:hover {
            background-color: #00f0ff;
            color: #000;
            cursor: pointer;
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
        <a href="{{ route('admin.pesanan.index') }}">📦 Pesanan</a>
        <a href="{{ route('admin.pembayaran.index') }}">💰 Pembayaran</a>
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</div>

<div class="container">
    <h1 class="title">🧑‍💻 Kelola Tugas Joki</h1>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Detail</th>
                    <th>Status</th>
                    <th>Joki</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pesanans as $pesanan)
                    <tr>
                        <td>{{ $pesanan->id }}</td>
                        <td>{{ $pesanan->user->name ?? '-' }}</td>
                        <td>{{ $pesanan->detail }}</td>
                        <td>{{ ucfirst($pesanan->status) }}</td>
                        <td>{{ $pesanan->joki->name ?? 'Belum ditugaskan' }}</td>
                        <td>
                            <form action="{{ route('admin.joki.tugaskan', $pesanan->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <select name="joki_id">
                                    <option value="">-- Pilih Joki --</option>
                                    @foreach ($jokis as $joki)
                                        <option value="{{ $joki->id }}" {{ $pesanan->joki_id == $joki->id ? 'selected' : '' }}>
                                            {{ $joki->name }}
                                        </option>
                                    @endforeach
                                </select>

                                <select name="status">
                                    <option value="pending" {{ $pesanan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="dikerjakan" {{ $pesanan->status == 'dikerjakan' ? 'selected' : '' }}>Dikerjakan</option>
                                    <option value="selesai" {{ $pesanan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                </select>

                                <button type="submit">Simpan</button>
                            </form>
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
