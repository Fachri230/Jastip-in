<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jastip-in Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-green-200">

    <aside class="fixed w-64 mb-10 h-screen shadow-xl bg-white text-green-700 border-r border-gray-100">
        <!-- Profil Pengguna -->
        <div class="flex flex-col p-6 bg-white items-center">
            <img src="{{ asset('images/yoga.png') }}" alt="User Profile" class="h-20 w-20 rounded-full object-cover border-2 border-green-600">
            <h2 class="font-semibold mt-2 text-gray-900"> {{ Auth::user()->name ?? Auth::user()->nama ?? 'Pengguna' }} </h2>
            <h2 class="font-bold text-xs text-emerald-600 uppercase tracking-wider mt-0.5">{{ Auth::user()->role ?? 'User' }}</h2>

            <a href="/editProfile" class="flex p-2 bg-white text-green-700 text-xs font-semibold border-2 border-green-700 rounded-full h-8 mt-3 items-center hover:border-white transition-colors duration-400 hover:bg-green-700 hover:text-white">
                Edit Profil
            </a>
        </div>

        <!-- Daftar Menu Sidebar -->
        <div class="p-6 font-semibold">
            <ul class="space-y-1">
                <!-- Menu Utama / Home -->
                <li class="block p-3 rounded-lg hover:bg-green-700 hover:text-white transition group">
                    <a href="/menu" class="block w-full">Home / Menu</a>
                </li>

                <!-- Navigasi Penjual -->
                <li class="block p-3 pl-8 rounded-lg bg-emerald-50 text-emerald-800 hover:bg-green-700 hover:text-white transition">
                    <a href="{{ route('penjual.produk.index') }}" class="block w-full">📦 Daftar Produk</a>
                </li>

                <li class="block p-3 pl-8 rounded-lg bg-emerald-50 text-emerald-800 hover:bg-green-700 hover:text-white transition">
                    <a href="{{ route('crud-stock.index') }}" class="block w-full">🗂️ Kelola Stok</a>
                </li>

                <!-- Menu Pesanan -->
                <li class="block p-3 rounded-lg hover:bg-green-700 hover:text-white transition">
                    <a href="/pesanan" class="block w-full">Pesanan</a>
                </li>

                <!-- Menu Riwayat -->
                <li class="block p-3 rounded-lg hover:bg-green-700 hover:text-white transition">
                    <a href="/Riwayat" class="block w-full">Riwayat</a>
                </li>

                <!-- Menu Logout -->
                <li class="block p-3 rounded-lg hover:bg-red-600 hover:text-white transition-colors">
                    <button type="button" class="w-full text-left cursor-pointer font-semibold"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </aside>

</body>
</html>