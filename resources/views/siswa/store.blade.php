<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kantin</title>
    @vite('resources/css/app.css')

</head>

<body class="bg-green-100">
    <nav class="bg-green-600 h-12 flex flex-row items-center justify-between px-8 fixed w-full">
        <div class="flex items-center">
            <button class="p-2 rounded-lg hover:bg-green-500 transition delay-75">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-menu" id="burger">
                    <path d="M4 5h16" />
                    <path d="M4 12h16" />
                    <path d="M4 19h16" />
                </svg>
            </button>

        </div>

        <div class="hidden md:flex items-center ml-32 w-94">
            <div class="relative w-full">

                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="#999999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-search absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5">
                    <path d="m21 21-4.34-4.34" />
                    <circle cx="11" cy="11" r="8" />
                </svg>

                <input type="text" placeholder="Cari..." class="w-full pl-10 pr-4 py-1 bg-gray-100 rounded-md
                       outline-none text-sm">
                </svg>
            </div>

        </div>

        <div class="flex items-center gap-2">
            <button class="p-2 rounded-xl hover:bg-green-500 transition delay-75">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-funnel">
                    <path
                        d="M10 20a1 1 0 0 0 .553.895l2 1A1 1 0 0 0 14 21v-7a2 2 0 0 1 .517-1.341L21.74 4.67A1 1 0 0 0 21 3H3a1 1 0 0 0-.742 1.67l7.225 7.989A2 2 0 0 1 10 14z" />
            </button>

            <a class="p-2 rounded-xl hover:bg-green-500 transition delay-75" href="{{ route('cart') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-shopping-cart-plus">
                    <path d="M16 5h6" />
                    <path d="M19 2v6" />
                    <path d="m2.05 2.05 1.099-.028a1 1 0 011.008.815l2.69 14.347A1 1 0 007.83 18H18" />
                    <path d="M4.564 5H12" />
                    <path d="M6.25 14h12.712a2 2 0 001.991-1.57l.172-1.041" />
                    <circle cx="18" cy="20" r="2" />
                    <circle cx="8" cy="20" r="2" />
                </svg>
            </a>

            <a class="p-2 rounded-xl hover:bg-green-500 transition delay-75" href="{{ route('history') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-rotate-ccw-clock">
                    <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8" />
                    <path d="M3 3v5h5" />
                    <path d="M12 7v5l4 2" />
                </svg>
            </a>

            <img src="{{ asset('images/yoga.png') }}" alt="Profile" class="h-8 w-8 rounded-full ">

        </div>

    </nav>

    <aside id="sidebar" class="fixed top-12 left-0 w-56 h-[calc(100vh-3rem)]
           bg-green-700 text-white
           transform -translate-x-full
           transition-transform duration-300 ease-in-out
           z-50">

        <div class="p-6">
            <h2 class="text-xl font-bold mb-6">
                Menu
            </h2>

            <ul class="space-y-2">

                <li>
                    <a href="{{ route('siswa') }}" class="block p-3 rounded-lg hover:bg-green-600">
                        Home
                    </a>
                </li>

                <li>
                    <a href="#" class="block p-3 rounded-lg hover:bg-green-600">
                        About
                    </a>
                </li>

                <li>
                    <a href="#" class="block p-3 rounded-lg hover:bg-green-600">
                        Projects
                    </a>
                </li>

                <li>
                    <a href="#" class="block p-3 rounded-lg hover:bg-green-600">
                        Contact
                    </a>
                </li>

            </ul>
        </div>

    </aside>

    <script>
        const menuButton = document.getElementById('burger');
        const sidebar = document.getElementById('sidebar');

        menuButton.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });
    </script>

   <div>
    <div>

    </div>
   </div>

</body>

</html>