@extends('layouts.app')

@section('content')
<div class="flex min-h-screen items-center justify-center bg-gray-50 px-4 py-12 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8 bg-white p-8 rounded-xl shadow-md border border-gray-100">
        <div>
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">
                {{ __('Register') }}
            </h2>
        </div>

        <form class="mt-8 space-y-4" method="POST" action="{{ route('register') }}">
            @csrf

           
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                    {{ __('Name') }}
                </label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                    class="block w-full rounded-md border-0 py-2.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6 @error('name') ring-red-500 focus:ring-red-500 @enderror">

                @error('name')
                    <p class="mt-1 text-sm text-red-600" role="alert">
                        <strong>{{ $message }}</strong>
                    </p>
                @enderror
            </div>

            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    {{ __('Email Address') }}
                </label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                    class="block w-full rounded-md border-0 py-2.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6 @error('email') ring-red-500 focus:ring-red-500 @enderror">

                @error('email')
                    <p class="mt-1 text-sm text-red-600" role="alert">
                        <strong>{{ $message }}</strong>
                    </p>
                @enderror
            </div>

           
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                    {{ __('Password') }}
                </label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="block w-full rounded-md border-0 py-2.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6 @error('password') ring-red-500 focus:ring-red-500 @enderror">

                @error('password')
                    <p class="mt-1 text-sm text-red-600" role="alert">
                        <strong>{{ $message }}</strong>
                    </p>
                @enderror
            </div>

           
            <div>
                <label for="password-confirm" class="block text-sm font-medium text-gray-700 mb-1">
                    {{ __('Confirm Password') }}
                </label>
                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password"
                    class="block w-full rounded-md border-0 py-2.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6">
            </div>

            
            <div class="pt-2">
                <button type="submit" 
                    class="flex w-full justify-center rounded-md bg-emerald-600 px-3 py-2.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-colors duration-200">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
