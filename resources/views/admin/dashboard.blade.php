<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
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
            margin-bottom: 40px;
            color: #00f0ff;
        }

        .grid {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 30px;
        }

        .card {
            background: #1a1a1a;
            border: 2px solid #00f0ff;
            box-shadow: 0 0 15px #00f0ff;
            padding: 30px;
            border-radius: 15px;
            width: 280px;
            transition: 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 0 25px #00f0ff;
        }

        .card h3 {
            margin-bottom: 10px;
            color: #00f0ff;
        }

        .card p {
            color: #ccc;
            font-size: 14px;
        }

        .card a {
            color: #00f0ff;
            text-decoration: none;
            display: block;
            margin-top: 10px;
        }

    </style>
</head>
<body>

<div class="navbar">
    <div class="logo">🎮 Admin Panel</div>
    <div class="menu">
        
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</div>

<div class="container">
    <h1 class="title">Dashboard Admin</h1>

    <div class="grid">
        <div class="card">
            <h3>📦 Pesanan</h3>
            <p>Lihat dan kelola semua pesanan dari pengguna.</p>
            <a href="{{ route('admin.pesanan.index') }}">➤ Kelola Pesanan</a>
        </div>
        <div class="card">
            <h3>🧑‍💻 Tugas Joki</h3>
            <p>Kelola informasi joki dan penugasannya.</p>
            <a href="{{ route('admin.joki.index') }}">➤ Kelola Joki</a>
        </div>
        <div class="card">
            <h3>💰 Pembayaran</h3>
            <p>Konfirmasi dan verifikasi pembayaran masuk.</p>
            <a href="{{ route('admin.pembayaran.index') }}">➤ Kelola Pembayaran</a>
        </div>
    </div>
</div>

</body>
</html>
