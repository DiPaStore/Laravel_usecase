<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel Joki - Customer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: #222;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }

        main {
            padding: 40px;
        }
    </style>
</head>
<body>

<nav>
    <div><strong>Laravel Joki</strong></div>
    <div>
        <a href="{{ route('customer.pesanan.index') }}">Pesanan Saya</a>
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit" style="margin-left: 20px;">Logout</button>
        </form>
    </div>
</nav>

<main>
    @yield('content')
</main>

</body>
</html>
