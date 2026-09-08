@extends('layouts.app')

@section('content')
<div class="flex min-h-screen items-center justify-center bg-sky-300 px-4 py-12 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8 bg-white p-8 rounded-xl shadow-md border border-gray-100">
        <div>
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">
                {{ __('Login') }}
            </h2>
        </div>

        <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
            @csrf

           
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    {{ __('User') }}
                </label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                    class="block w-full rounded-md border-0 py-2.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6 @error('email') ring-red-500 focus:ring-red-500 @enderror">

                @error('email')
                    <p class="mt-2 text-sm text-red-600" role="alert">
                        <strong>{{ $message }}</strong>
                    </p>
                @enderror
            </div>

           
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                    {{ __('Password') }}
                </label>
                <div class="relative rounded-md shadow-sm">
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="block w-full rounded-md border-0 py-2.5 pl-3 pr-12 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6 @error('password') ring-red-500 focus:ring-red-500 @enderror">
                    
                    <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 flex items-center pr-3 text-sm font-medium text-gray-500 hover:text-emerald-600 transition-colors">
                        Lihat
                    </button>
                </div>

                @error('password')
                    <p class="mt-2 text-sm text-red-600" role="alert">
                        <strong>{{ $message }}</strong>
                    </p>
                @enderror
            </div>

          
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}
                        class="h-4 w-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-600">
                    <label for="remember" class="ml-2 block text-sm text-gray-900">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                @if (Route::has('password.request'))
                    <div class="text-sm">
                        <a href="{{ route('password.request') }}" class="font-medium text-emerald-600 hover:text-emerald-500 transition-colors duration-200">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                @endif
            </div>

           
            <div>
                <button type="submit" 
                    class="flex w-full justify-center rounded-md bg-emerald-600 px-3 py-2.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600 transition-colors duration-200">
                    {{ __('Login') }}
                </button>
            </div>
        </form>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const passwordInput = document.getElementById('password');
        const toggleButton = document.getElementById('togglePassword');

        toggleButton.addEventListener('click', function () {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleButton.textContent = 'Sembunyikan';
            } else {
                passwordInput.type = 'password';
                toggleButton.textContent = 'Lihat';
            }
        });
    });
</script>
@endsection
