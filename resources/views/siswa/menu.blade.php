<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')

</head>

<body>
    <nav class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6">

    <!-- Left Side -->
    <div class="flex items-center gap-4">

        <!-- Burger Button -->
        <button class="p-2 rounded-lg hover:bg-gray-100 transition">
            <svg
                class="w-6 h-6 text-gray-700"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"
                />
            </svg>
        </button>

        <!-- Logo -->
        <h1 class="text-xl font-bold text-gray-800">
            MyDashboard
        </h1>

    </div>


    <!-- Search Bar -->
    <div class="hidden md:flex items-center w-96">

        <div class="relative w-full">

            <!-- Search Icon -->
            <svg
                class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="m21 21-4.35-4.35m2.35-5.65a8 8 0 1 1-16 0 8 8 0 0 1 16 0z"
                />
            </svg>

            <input
                type="text"
                placeholder="Search..."
                class="w-full pl-10 pr-4 py-2 bg-gray-100 rounded-lg
                       outline-none focus:ring-2 focus:ring-green-500
                       text-sm"
            >

        </div>

    </div>


    <!-- Right Side / User -->
    <div class="flex items-center gap-3">

        <!-- Profile Image -->
        <img
            src="https://i.pravatar.cc/100?img=12"
            alt="Profile"
            class="w-10 h-10 rounded-full object-cover"
        >

        <!-- User Information -->
        <div class="hidden sm:block leading-tight">

            <p class="font-semibold text-gray-800 text-sm">
                John Doe
            </p>

            <p class="text-xs text-gray-500">
                Administrator
            </p>

        </div>

        <!-- Dropdown Arrow -->
        <button class="p-1 hover:bg-gray-100 rounded-lg">

            <svg
                class="w-5 h-5 text-gray-500"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="m6 9 6 6 6-6"
                />
            </svg>

        </button>

    </div>

</nav>


</body>

</html>