<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Toko Jastip</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-green-200 min-h-screen flex items-center justify-center py-12 px-4">

    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
        <div class="mb-6 text-center">
            <h2 class="text-2xl font-bold text-green-700">Mendaftar Jadi Penjual</h2>
            <p class="text-xs text-gray-500 mt-1">Lengkapi informasi di bawah ini untuk membuka toko jastip Anda.</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-800 p-3 rounded-xl mb-4 text-xs font-medium">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('proses.daftar-toko') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-1">Nama Toko / Kantin</label>
                <input type="text" name="nama_toko" required placeholder="Contoh: Lapak Jajanan Satriyo" 
                    class="block w-full rounded-xl border border-gray-300 py-2.5 px-3.5 text-sm focus:ring-2 focus:ring-green-600 outline-none">
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-1">Nomor WhatsApp Aktif</label>
                <input type="number" name="no_hp" required placeholder="Contoh: 08123456789" 
                    class="block w-full rounded-xl border border-gray-300 py-2.5 px-3.5 text-sm focus:ring-2 focus:ring-green-600 outline-none">
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-1">Deskripsi Singkat Jualan</label>
                <textarea name="deskripsi" rows="3" required placeholder="Contoh: Menjual aneka makaroni pedas dan minuman segar es teh..." 
                    class="block w-full rounded-xl border border-gray-300 py-2.5 px-3.5 text-sm focus:ring-2 focus:ring-green-600 outline-none"></textarea>
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full bg-green-600 hover:bg-green-500 text-white font-semibold py-2.5 px-4 rounded-xl text-sm shadow-sm transition duration-200 cursor-pointer text-center">
                    Kirim Pengajuan ke Admin
                </button>
                <a href="/menu" class="block text-center text-xs text-gray-500 mt-3 hover:underline">Batal</a>
            </div>
        </form>
    </div>

</body>
</html>
