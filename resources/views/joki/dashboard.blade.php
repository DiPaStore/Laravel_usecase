<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Joki</title>
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
            font-size: 28px;
            margin-bottom: 20px;
        }

        .desc {
            font-size: 16px;
            color: #aaa;
            max-width: 600px;
            margin: 0 auto;
        }

        .dashboard-card {
            background: #1a1a1a;
            border: 2px solid #00f0ff;
            border-radius: 15px;
            padding: 30px;
            max-width: 500px;
            margin: 40px auto;
            box-shadow: 0 0 20px #00f0ff;
        }

        .btn-group {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .action-btn {
            background-color: transparent;
            border: 2px solid #00f0ff;
            color: #00f0ff;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
            font-family: 'Orbitron', sans-serif;
        }

        .action-btn:hover {
            background-color: #00f0ff;
            color: #000;
            box-shadow: 0 0 15px #00f0ff;
        }

    </style>
</head>
<body>

<div class="navbar">
    <div class="logo">🎮 Joki Panel</div>
    <div class="menu">
        <a href="{{ route('dashboard') }}">🏠 Dashboard</a>
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</div>

<div class="container">
    <div class="dashboard-card">
        <p>Selamat datang, <strong>{{ Auth::user()->name }}</strong>!</p>
        <p class="desc">
            Di sini kamu dapat melihat dan menyelesaikan tugas joki yang telah diberikan.<br>
            Jaga performa dan semangatmu!
        </p>

        <div class="btn-group">
            <a href="{{ route('joki.tugas.index') }}" class="action-btn">📋 Lihat Semua Tugas</a>
            @if($pesananPertama = \App\Models\Pesanan::where('joki_id', Auth::id())->first())
                <a href="{{ route('joki.tugas.show', $pesananPertama->id) }}" class="action-btn">🔍 Lihat Tugas Pertama</a>
            @endif
        </div>
    </div>
</div>

</body>
</html>
