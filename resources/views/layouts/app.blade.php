<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>jastip-in | Pesanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.5/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100 h-screen overflow-hidden">
    <div class="flex h-screen">
        @include('components.sidebar')
        <div class="flex-1 flex">
            @yield('content')
        </div>
    </div>
</body>
</html>
