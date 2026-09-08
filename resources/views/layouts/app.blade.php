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
    
   
   <nav class="bg-gray-300 border-b border-emerald-400 text-black">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                   <a href="{{ url('/') }}" class="text-xl font-bold text-emerald-600">
                      Jastip-in
                        </a>

                </div>
                <div class="flex items-center space-x-4 text-sm font-medium text-gray-600">
                    @guest
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="hover:text-emerald-600 transition">{{ __('Login') }}</a>
                        @endif
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="hover:text-emerald-600 transition">{{ __('Register') }}</a>
                        @endif
                    @else
                        <span class="text-gray-700">{{ Auth::user()->name }}</span>
                        <a href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           class="hover:text-red-600 transition">
                            {{ __('Logout') }}
                        </a>
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
