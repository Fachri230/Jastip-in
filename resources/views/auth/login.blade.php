@extends('layouts.app')

@section('content')
<!-- Pembungkus Gradasi Luar -->
<div class="flex min-h-[calc(100vh-64px)] items-center justify-center bg-gradient-to-br from-emerald-500 via-teal-100 to-emerald-200 px-4 py-12 relative overflow-hidden">
    
    <!-- Elemen Dekorasi Latar Belakang -->
    <div class="absolute -top-20 -left-20 w-80 h-80 bg-emerald-400/20 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-20 -right-20 w-96 h-96 bg-teal-500/20 rounded-full blur-3xl"></div>

    <!-- Kotak Putih Utama (Card Login) -->
    <div class="w-full max-w-md space-y-6 bg-white/95 backdrop-blur-sm p-8 rounded-2xl shadow-2xl border border-white/20 relative z-10">
        
        <div>
            <h2 class="mt-2 text-center text-3xl font-extrabold tracking-tight text-emerald-700">
                Login
            </h2>
        </div>

        <form class="space-y-5" method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Input User / Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    User / Email
                </label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                    class="block w-full rounded-xl border border-gray-300 py-2.5 px-3.5 text-gray-900 shadow-sm focus:ring-2 focus:ring-emerald-600 text-sm">
                @error('email')
                    <p class="mt-1 text-xs text-red-600"><strong>{{ $message }}</strong></p>
                @enderror
            </div>

            <!-- Input Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                    Password
                </label>
                <div class="relative rounded-xl shadow-sm">
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="block w-full rounded-xl border border-gray-300 py-2.5 pl-3.5 pr-12 text-gray-900 focus:ring-2 focus:ring-emerald-600 text-sm">
                    <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 flex items-center pr-3 text-xs font-semibold text-emerald-600 hover:text-emerald-500 transition-colors">
                        Lihat
                    </button>
                </div>
                @error('password')
                    <p class="mt-1 text-xs text-red-600"><strong>{{ $message }}</strong></p>
                @enderror
            </div>

            <!-- Pilihan Remember & Forgot -->
            <div class="flex items-center justify-between pt-1">
                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}
                        class="h-4 w-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-600">
                    <label for="remember" class="ml-2 block text-sm text-gray-700">
                        Remember Me
                    </label>
                </div>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm font-medium text-emerald-600 hover:text-emerald-500 transition-colors">
                        Forgot Your Password?
                    </a>
                @endif
            </div>

            <!-- Tombol Login Hijau -->
            <div class="pt-2">
                <button type="submit" 
                    class="flex w-full justify-center rounded-xl bg-emerald-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-emerald-500 focus:ring-2 focus:ring-emerald-600 transition duration-200 cursor-pointer">
                    Login
                </button>
            </div>
        </form>

    </div> <!-- 🟢 Tag penutup kotak putih sekarang berada di bawah form dengan benar -->
</div>

<!-- Script Fitur Intip Password -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const passwordInput = document.getElementById('password');
        const toggleButton = document.getElementById('togglePassword');

        if(toggleButton && passwordInput) {
            toggleButton.addEventListener('click', function () {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    toggleButton.textContent = 'Sembunyikan';
                } else {
                    passwordInput.type = 'password';
                    toggleButton.textContent = 'Lihat';
                }
            });
        }
    });
</script>
@endsection
