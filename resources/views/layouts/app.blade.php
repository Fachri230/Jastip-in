<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-900">
    
   <nav class="bg-green-200 border-b border-emerald-400 text-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ url('/') }}" class="text-xl font-bold text-emerald-600">
                        Jastip-in
                    </a>
                </div>

                <div class="flex items-center space-x-4 text-sm font-medium text-gray-600">
                @guest
                    <a href="{{ route('login') }}" class="hover:text-emerald-600 transition">{{ __('Login') }}</a>
                    <a href="{{ route('register') }}" class="hover:text-emerald-600 transition">{{ __('Register') }}</a>
                @else
                    <!-- 🟢 MENAMPILKAN MENU KHUSUS JIKA YANG LOGIN ADALAH PENJUAL (SELLER) -->
                    @if(Auth::user()->role === 'seller')
                        <a href="{{ route('penjual.produk.index') }}" class="text-emerald-700 hover:text-emerald-900 transition font-semibold">
                            📦 Daftar Produk
                        </a>
                        <a href="{{ route('crud-stock.index') }}" class="text-emerald-700 hover:text-emerald-900 transition font-semibold mr-2">
                            🗂️ Kelola Stok
                        </a>
                    @endif
               
                    <!-- Nama Pengguna -->
                    <span class="text-gray-700 font-bold border-l pl-3 border-emerald-400">{{ Auth::user()->name }}</span>
                    
                    <!-- Tombol Logout -->
                    <button type="button" 
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="rounded-md bg-emerald-500 px-4 py-2 text-sm font-medium text-white hover:bg-emerald-600 transition duration-150 cursor-pointer">
                        {{ __('Logout') }}
                    </button>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                @endguest
                </div>
            </div>
        </div>
    </nav>
 
    <main>
        @yield('content')
    </main>
</body>
</html>
