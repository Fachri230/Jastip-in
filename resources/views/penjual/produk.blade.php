@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#d1fae5]/30 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header Utama -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Katalog Produk Saya</h1>
                <p class="text-sm text-gray-500 mt-1">Kelola daftar menu makanan, minuman, harga, dan update ketersediaan stok jastip.</p>
            </div>
            <a href="{{ route('penjual.produk.create') }}" class="inline-flex items-center justify-center bg-emerald-600 hover:bg-emerald-500 text-white px-5 py-2.5 rounded-xl text-sm font-semibold shadow-sm transition duration-200">
                + Tambah Produk Baru
            </a>
        </div>

        @if(session('success'))
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-4 rounded-xl mb-6 text-sm font-medium">
                ✅ {{ session('success') }}
            </div>
        @endif

        <!-- Tabel Data -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-emerald-600 text-white text-xs font-semibold uppercase tracking-wider">
                            <th class="p-4 text-center">No.</th>
                            <th class="p-4">Gambar</th>
                            <th class="p-4">Nama Produk</th>
                            <th class="p-4">Kategori</th>
                            <th class="p-4">Stok</th>
                            <th class="p-4">Harga Satuan</th>
                            <th class="p-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                        @forelse ($produks as $index => $produk)
                        <tr class="hover:bg-gray-50/70 transition">
                            <td class="p-4 text-center font-medium text-gray-400">{{ $index + 1 }}</td>
                            <td class="p-4">
                                @if ($produk->img)
                                    <img src="{{ Str::startsWith($produk->img, 'http') ? $produk->img : Storage::url($produk->img) }}" 
                                         alt="{{ $produk->nama_produk }}" class="w-12 h-12 object-cover rounded-lg border border-gray-100 shadow-sm">
                                @else
                                    <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center text-[10px] text-gray-400 font-medium">No Img</div>
                                @endif
                            </td>
                            <td class="p-4 font-semibold text-gray-900">{{ $produk->nama_produk }}</td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-md text-xs font-medium {{ $produk->kategori === 'Makanan' ? 'bg-orange-50 text-orange-700 border border-orange-100' : 'bg-blue-50 text-blue-700 border border-blue-100' }}">
                                    {{ $produk->kategori }}
                                </span>
                            </td>
                            <td class="p-4 font-medium text-gray-600">{{ $produk->stok }} Pcs</td>
                            <td class="p-4 font-bold text-emerald-600">Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                            <td class="p-4 text-center space-x-3 font-medium">
                                <a href="{{ route('penjual.produk.edit', $produk->id_produk) }}" class="text-emerald-600 hover:text-emerald-700 transition">Edit</a>
                                <form action="{{ route('penjual.produk.destroy', $produk->id_produk) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-600 transition cursor-pointer">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="p-12 text-center text-gray-400 font-medium">Belum ada produk jastip yang didaftarkan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
