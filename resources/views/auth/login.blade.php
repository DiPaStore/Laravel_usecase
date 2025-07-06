<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Gamer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap');

        body {
            background-color: #0d0d0d;
            color: #fff;
            font-family: 'Orbitron', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: radial-gradient(circle at top left, #111, #000);
        }

        .login-box {
            background: #1a1a1a;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px #00f0ff;
            width: 350px;
            animation: fadeIn 1s ease;
        }

        .login-box h2 {
            text-align: center;
            color: #00f0ff;
            margin-bottom: 30px;
        }

        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0 20px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
            box-shadow: inset 0 0 5px #00f0ff;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #00f0ff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #00c4cc;
            box-shadow: 0 0 10px #00f0ff;
        }

        .register {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .register a {
            color: #00f0ff;
            text-decoration: none;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(-20px);}
            to {opacity: 1; transform: translateY(0);}
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login JokiGame</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <input type="email" name="email" placeholder="Email" required autofocus>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Login</button>
    </form>

    <div class="register">
        Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
    </div>
</div>

</body>
</html>
