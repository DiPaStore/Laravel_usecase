<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Pesanan</title>
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
            padding: 16px 20px;
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
            padding: 6px 12px;
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
            max-width: 600px;
            margin: 40px auto;
            background: #1a1a1a;
            border: 2px solid #00f0ff;
            box-shadow: 0 0 20px #00f0ff;
            padding: 30px;
            border-radius: 15px;
        }

        .title {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
            color: #00f0ff;
        }

        label {
            display: block;
            margin-top: 20px;
            margin-bottom: 6px;
            color: #00f0ff;
            text-align: left;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            background-color: #333;
            color: #fff;
            font-family: inherit;
            box-shadow: inset 0 0 5px #00f0ff;
        }

        .submit-btn {
            margin-top: 25px;
            width: 100%;
            padding: 12px;
            background-color: #00f0ff;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            color: #000;
            box-shadow: 0 0 10px #00f0ff;
        }

        .submit-btn:hover {
            background-color: #00c4cc;
            box-shadow: 0 0 20px #00f0ff;
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
    <h1 class="title">✏️ Edit Pesanan</h1>

    <form action="{{ route('customer.pesanan.update', $pesanan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="detail">Detail Pesanan</label>
        <textarea name="detail" id="detail" rows="4" required>{{ $pesanan->detail }}</textarea>

        <label for="harga">Harga</label>
        <input type="text" name="harga" id="harga" value="{{ $pesanan->harga }}" required>

        <button type="submit" class="submit-btn">💾 Simpan Perubahan</button>
    </form>
</div>

</body>
</html>
