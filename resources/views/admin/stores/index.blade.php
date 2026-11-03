<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persetujuan Toko</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-green-100 p-6">
<div class="max-w-5xl mx-auto">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold text-green-800">Pengajuan Toko Penjual</h1>
        <a href="{{ url('/menu') }}" class="text-sm text-green-700 hover:underline">← Kembali ke menu</a>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 rounded-lg p-3 mb-4 text-sm">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 rounded-lg p-3 mb-4 text-sm">{{ $errors->first() }}</div>
    @endif

    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="bg-green-600 text-white">
                <tr>
                    <th class="p-3">Pemohon</th>
                    <th class="p-3">Toko</th>
                    <th class="p-3">Alamat / Telepon</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse($stores as $s)
                <tr class="border-b align-top">
                    <td class="p-3">
                        {{ $s->user->nama }}<br>
                        <span class="text-gray-500 text-xs">{{ $s->user->email }}</span>
                    </td>
                    <td class="p-3">
                        <strong>{{ $s->store_name }}</strong>
                        <p class="text-gray-500 text-xs">{{ $s->description }}</p>
                    </td>
                    <td class="p-3">{{ $s->address }}<br>{{ $s->phone }}</td>
                    <td class="p-3">
                        @if($s->status === 'pending')
                            <span class="px-2 py-1 rounded bg-yellow-100 text-yellow-800 text-xs">Menunggu</span>
                        @elseif($s->status === 'approved')
                            <span class="px-2 py-1 rounded bg-green-100 text-green-800 text-xs">Disetujui</span>
                        @else
                            <span class="px-2 py-1 rounded bg-red-100 text-red-800 text-xs">Ditolak</span>
                        @endif
                    </td>
                    <td class="p-3">
                        @if($s->status === 'pending')
                            <form action="{{ route('admin.stores.approve', $s->id_store) }}" method="POST" class="mb-2">
                                @csrf
                                <button class="w-full bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">Setujui</button>
                            </form>
                            <form action="{{ route('admin.stores.reject', $s->id_store) }}" method="POST">
                                @csrf
                                <input type="text" name="rejection_reason" placeholder="Alasan penolakan" required
                                    class="w-full border rounded px-2 py-1 mb-1 text-xs">
                                <button class="w-full bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Tolak</button>
                            </form>
                        @else
                            <span class="text-gray-400 text-xs">-</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="p-4 text-center text-gray-500">Belum ada pengajuan.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
</body>
</html>