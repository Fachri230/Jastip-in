<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

@vite('resources/css/app.css')


<body class="bg-gray-300 scrollbar-none scroll-smooth">
    <div class="bg-green-700 h-10 fixed pr-255">
        <li class="flex flex-inline leading-5 text-xl text-center text-white font-semibold italic">
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.75 15H26.25M3.75 7.5H26.25M3.75 22.5H26.25" stroke="white" stroke-width="3.5"
                    stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <a class="ml-118 h-10 rounded-xs hover:bg-green-900 p-2 hover:duration-350 hover:delay-150"
                href="{{ route('siswa') }}">Home</a>
            <a class="h-10 rounded-xs hover:bg-green-900 p-2 hover:duration-350 hover:delay-150"
                href="{{ route('menu') }}">Store</a>
            <a class="h-10 rounded-xs hover:bg-green-900 p-2 hover:duration-350 hover:delay-150"
                href="{{ route('history') }}">History</a>
        </li>
    </div>
</body>

</html>