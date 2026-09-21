<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-green-200">


    <aside class="fixed w-64 mb-10 h-screen shadow-xl/60 bg-white text-green-700">
        <div class="flex flex-col p-6 bg-white items-center">

            <img src="{{ asset('images/yoga.png') }}" alt="User Profile" class="h-20 w-20 rounded-full">

            <h2 class="font-semibold mt-1"> {{ $user->nama }} </h2>

            <h2 class="font-bold text-sm">{{ $user->role }}</h2>

            <a href="/editProfile" class=" flex p-2 bg-white text-green-700 text-sm font-semibold border-2 border-green-700 rounded-full h-8 mt-2 items-center
         hover:border-white transition-colors duration-400 hover:bg-green-700 hover:text-white">Edit Profil</a>


        </div>


        <div class="p-6 font-semibold">

            <li class="list-none">
                <ul class="block p-3 rounded-lg hover:bg-green-700 hover:text-white">
                    <a href="/menu">Menu</a>
                </ul>


                <ul class="block p-3 rounded-lg hover:bg-green-700 hover:text-white">
                    <a href="/pesanan">Pesanan</a>
                </ul>


                <ul class="block p-3 mb-35 rounded-lg hover:bg-green-700 hover:text-white">
                    <a href="/Riwayat">Riwayat</a>
                </ul>


                <ul class="block p-3 rounded-lg hover:bg-green-700 hover:text-white">

                    <button type="button"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </button>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>

                </ul>

            </li>

        </div>

    </aside>

</body>

</html>