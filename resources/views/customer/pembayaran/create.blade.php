<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pembayaran Pesanan</title>
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
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 0 10px #00f0ff;
        }

        .logo {
            font-size: 18px;
            font-weight: bold;
            color: #00f0ff;
        }

        .menu {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .menu a {
            color: #00f0ff;
            text-decoration: none;
            font-size: 13px;
        }

        .logout-btn {
            background-color: transparent;
            border: 2px solid #ff4b5c;
            color: #ff4b5c;
            padding: 6px 12px;
            border-radius: 5px;
            font-family: inherit;
            font-size: 13px;
            cursor: pointer;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background-color: #ff4b5c;
            color: white;
        }

        .container {
            padding: 30px 20px;
            max-width: 600px;
            margin: 0 auto;
        }

        .title {
            font-size: 24px;
            margin-bottom: 25px;
            text-align: center;
        }

        .form-card {
            background: #1a1a1a;
            border: 2px solid #00f0ff;
            box-shadow: 0 0 15px #00f0ff;
            border-radius: 12px;
            padding: 25px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-size: 13px;
            text-align: left;
        }

        input[type="text"],
        select,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            border-radius: 6px;
            border: none;
            background-color: #2b2b2b;
            color: #00f0ff;
            font-family: inherit;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #00f0ff;
            color: #000; /* Teks tombol hitam */
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #00c4cc;
            box-shadow: 0 0 8px #00f0ff;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <div class="logo">🎮 JokiGame</div>
        <div class="menu">
            <a href="{{ route('dashboard') }}">🏠 Dashboard</a>
            <a href="{{ route('customer.pesanan.index') }}">📦 Pesanan Saya</a>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </div>

    <div class="container">
        <h1 class="title">💳 Pembayaran Pesanan</h1>

        <div class="form-card">
            <form action="{{ route('customer.pembayaran.store', $pesanan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <label>Detail Pesanan</label>
                <input type="text" value="{{ $pesanan->detail }}" disabled>

                <label>Harga</label>
                <input type="text" name="jumlah" value="{{ $pesanan->harga }}" readonly>

                <label>Metode Pembayaran</label>
                <select name="metode" required>
                    <option value="Transfer Bank">Transfer Bank</option>
                    <option value="E-Wallet">E-Wallet</option>
                </select>

                <label>Bukti Transfer (Opsional)</label>
                <input type="file" name="bukti" accept="image/*">

                <button type="submit">Bayar Sekarang</button>
            </form>
        </div>
    </div>

</body>
</html>
