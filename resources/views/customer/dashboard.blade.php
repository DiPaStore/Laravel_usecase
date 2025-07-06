<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Customer</title>
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
            padding: 60px 20px;
            text-align: center;
        }

        .title {
            font-size: 32px;
            margin-bottom: 30px;
            color: #00f0ff;
        }

        .subtitle {
            font-size: 18px;
            margin-bottom: 50px;
            color: #ccc;
        }

        .action-button {
            background-color: #00f0ff;
            border: none;
            color: black;
            padding: 12px 30px;
            font-size: 16px;
            border-radius: 10px;
            font-family: inherit;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 0 10px #00f0ff;
            transition: 0.3s;
        }

        .action-button:hover {
            background-color: #00c4cc;
            box-shadow: 0 0 15px #00f0ff;
        }

    </style>
</head>
<body>

<div class="navbar">
    <div class="logo">🎮 JokiGame</div>
    <div class="menu">
        <a href="{{ route('customer.pesanan.index') }}">📋 Pesanan Saya</a>
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</div>

<div class="container">
    <h1 class="title">Selamat Datang, {{ Auth::user()->name }}!</h1>
    <p class="subtitle">Ready to dominate the game? 🕹️ Buat pesananmu sekarang dan biarkan joki pro menyelesaikannya untukmu!</p>

    <a href="{{ route('customer.pesanan.create') }}">
        <button class="action-button">🎯 Buat Pesanan Sekarang</button>
    </a>
</div>

</body>
</html>
