<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Tugas</title>
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
            cursor: pointer;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background-color: #ff4b5c;
            color: white;
        }

        .container {
            padding: 40px;
            max-width: 600px;
            margin: 40px auto;
            background: #1a1a1a;
            border: 2px solid #00f0ff;
            box-shadow: 0 0 20px #00f0ff;
            border-radius: 15px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        p {
            margin: 10px 0;
            font-size: 15px;
        }

        label, select, button {
            display: block;
            width: 100%;
            margin-top: 15px;
        }

        select {
            padding: 10px;
            border-radius: 6px;
            background-color: #111;
            color: #00f0ff;
            border: 1px solid #00f0ff;
        }

        button {
            margin-top: 20px;
            padding: 12px;
            background-color: #00f0ff;
            color: #000;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #00c4cc;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="logo">🕹️ Tugas Joki</div>
    <div class="menu">
        <a href="{{ route('dashboard') }}">🏠 Dashboard</a>
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</div>

<div class="container">
    <h1>🧾 Detail Tugas</h1>

    <p><strong>ID:</strong> {{ $pesanan->id }}</p>
    <p><strong>Detail:</strong> {{ $pesanan->detail }}</p>
    <p><strong>Harga:</strong> Rp {{ number_format($pesanan->harga, 0, ',', '.') }}</p>
    <p><strong>Status Saat Ini:</strong> {{ ucfirst($pesanan->status) }}</p>

    <form method="POST" action="{{ route('joki.tugas.update', $pesanan->id) }}">
        @csrf
        <label for="status">Ubah Status</label>
        <select name="status" id="status">
            <option value="pending" {{ $pesanan->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="dikerjakan" {{ $pesanan->status == 'dikerjakan' ? 'selected' : '' }}>Dikerjakan</option>
            <option value="selesai" {{ $pesanan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
        </select>
        <button type="submit">✅ Update Status</button>
    </form>
</div>

</body>
</html>
