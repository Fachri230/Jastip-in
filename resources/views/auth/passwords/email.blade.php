@extends('layouts.app')

@section('content')
<div class="flex min-h-screen items-center justify-center bg-gray-50 px-4 py-12 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-6 bg-white p-8 rounded-xl shadow-md border border-gray-100">
        <div>
            <h2 class="mt-2 text-center text-2xl font-bold tracking-tight text-gray-900">
                {{ __('Reset Password') }}
            </h2>
            <p class="mt-2 text-center text-sm text-gray-500">
                Masukkan alamat email Anda untuk menerima tautan reset kata sandi.
            </p>
        </div>

        @if (session('status'))
            <div class="rounded-md bg-green-50 p-4 border border-green-200" role="alert">
                <div class="text-sm font-medium text-green-800">
                    {{ session('status') }}
                </div>
            </div>
        @endif

        <form class="space-y-5" method="POST" action="{{ route('password.email') }}">
            @csrf

            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    {{ __('Email Address') }}
                </label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                    class="block w-full rounded-md border-0 py-2.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6 @error('email') ring-red-500 focus:ring-red-500 @enderror">

                @error('email')
                    <p class="mt-1 text-sm text-red-600" role="alert">
                        <strong>{{ $message }}</strong>
                    </p>
                @enderror
            </div>

           
            <div>
                <button type="submit" 
                    class="flex w-full justify-center rounded-md bg-emerald-600 px-3 py-2.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600 transition-colors duration-200">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
