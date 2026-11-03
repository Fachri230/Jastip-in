<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Jadi Penjual</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-green-100 min-h-screen flex items-center justify-center p-4">

<div class="w-full max-w-lg bg-white rounded-2xl shadow-lg overflow-hidden">
    <div class="bg-green-600 text-white px-6 py-4">
        <h1 class="text-xl font-bold">Daftar Jadi Penjual</h1>
        <p class="text-sm text-green-100">Lengkapi data toko Anda. Pengajuan akan ditinjau oleh admin.</p>
    </div>

    <form action="{{ route('seller.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
        @csrf

        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 text-sm rounded-lg p-3">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Muncul hanya jika pengajuan sebelumnya ditolak admin --}}
        @if(isset($store) && $store && $store->status === 'rejected')
            <div class="bg-yellow-50 border border-yellow-300 text-yellow-800 text-sm rounded-lg p-3">
                <p class="font-semibold">Pengajuan sebelumnya ditolak.</p>
                <p>Alasan: {{ $store->rejection_reason }}</p>
                <p class="mt-1">Silakan perbaiki data dan ajukan ulang.</p>
            </div>
        @endif

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Toko</label>
            <input type="text" name="store_name" value="{{ old('store_name', $store->store_name ?? '') }}" required
                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi Toko <span class="text-gray-400 font-normal">(opsional)</span></label>
            <textarea name="description" rows="3"
                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">{{ old('description', $store->description ?? '') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Alamat / Lokasi Toko</label>
            <textarea name="address" rows="2" required
                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">{{ old('address', $store->address ?? '') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Nomor Telepon / WhatsApp</label>
            <input type="text" name="phone" value="{{ old('phone', $store->phone ?? '') }}" placeholder="081234567890" required
                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Logo Toko <span class="text-gray-400 font-normal">(opsional, maks 2 MB)</span></label>
            <input type="file" name="logo" accept="image/*"
                class="w-full text-sm border border-gray-300 rounded-lg p-2">
        </div>

        <div class="flex gap-3 pt-2">
            <a href="{{ url('/dashboard') }}"
                class="flex-1 text-center py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100">Batal</a>
            <button type="submit"
                class="flex-1 py-2 rounded-lg bg-green-600 text-white font-semibold hover:bg-green-700">Ajukan Pendaftaran Toko</button>
        </div>
    </form>
</div>

</body>
</html>