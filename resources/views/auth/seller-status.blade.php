<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pengajuan Toko</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-green-100 min-h-screen flex items-center justify-center p-4">
<div class="w-full max-w-lg bg-white rounded-2xl shadow-lg p-6 text-center">

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 text-sm rounded-lg p-3 mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($store->status === 'pending')
        <div class="text-5xl mb-3">⏳</div>
        <h1 class="text-xl font-bold text-gray-800">Menunggu Persetujuan Admin</h1>
        <p class="text-gray-600 text-sm mt-2">
            Pengajuan toko <strong>{{ $store->store_name }}</strong> sedang ditinjau. Anda akan bisa berjualan setelah disetujui.
        </p>
    @elseif($store->status === 'approved')
        <div class="text-5xl mb-3">✅</div>
        <h1 class="text-xl font-bold text-gray-800">Toko Disetujui</h1>
        <a href="{{ route('penjual.produk.index') }}"
           class="inline-block mt-4 bg-green-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-green-700">
            Ke Dashboard Penjual
        </a>
    @else
        <div class="text-5xl mb-3">❌</div>
        <h1 class="text-xl font-bold text-gray-800">Pengajuan Ditolak</h1>
        <p class="text-gray-600 text-sm mt-2">Alasan: {{ $store->rejection_reason }}</p>
        <a href="{{ route('seller.register') }}"
           class="inline-block mt-4 bg-yellow-400 text-gray-900 px-4 py-2 rounded-lg font-semibold hover:bg-yellow-500">
            Ajukan Ulang
        </a>
    @endif

    <a href="{{ url('/menu') }}" class="block mt-4 text-sm text-gray-500 hover:underline">Kembali ke menu</a>
</div>
</body>
</html>