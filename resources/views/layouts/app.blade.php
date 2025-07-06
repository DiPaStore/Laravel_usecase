<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Laravel Joki</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow p-4 flex justify-between">
        <div>
            <a href="{{ url('/dashboard') }}" class="font-bold">Laravel Joki</a>
        </div>
        <div class="flex gap-4">
            @auth
                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('admin.joki.index') }}">Kelola Joki</a>
                    <a href="{{ route('admin.pesanan.index') }}">Kelola Pesanan</a>
                   <a href="{{ route('admin.pembayaran.index') }}" class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700 transition">
    💰 Kelola Pembayaran
</a>

                @elseif (auth()->user()->role === 'customer')
                    <a href="{{ route('admin.pesanan.index') }}">Pesanan Saya</a>
                @elseif (auth()->user()->role === 'joki')
                    <a href="{{ route('joki.tugas.index') }}">Tugas Joki</a>
                @endif
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="ml-4 text-red-500">Logout</button>
                </form>
            @endauth
        </div>
    </nav>

    <main class="p-6">
        @yield('content')
    </main>
</body>
</html>
