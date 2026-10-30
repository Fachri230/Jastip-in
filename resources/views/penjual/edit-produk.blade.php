@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#d1fae5]/30 py-8 flex items-center justify-center">
    <div class="w-full max-w-xl bg-white p-8 rounded-2xl shadow-xl border border-gray-100 mx-4">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Edit Data Produk</h2>
            <p class="text-sm text-gray-500 mt-1">Perbarui atau sesuaikan informasi menu produk jastip Anda.</p>
        </div>

        <form action="{{ route('penjual.produk.update', $produk->id_produk) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Nama Produk -->
            <div>
                <label for="nama_produk" class="block text-sm font-semibold text-gray-700 mb-1">Nama Produk / Menu</label>
                <input type="text" id="nama_produk" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}" required
                    class="block w-full rounded-xl border border-gray-300 py-2.5 px-3.5 text-gray-900 shadow-sm focus:ring-2 focus:ring-emerald-600 text-sm">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Kategori -->
                <div>
                    <label for="kategori" class="block text-sm font-semibold text-gray-700 mb-1">Kategori</label>
                    <select id="kategori" name="kategori" required class="block w-full rounded-xl border border-gray-300 py-2.5 px-3.5 text-gray-900 shadow-sm focus:ring-2 focus:ring-emerald-600 text-sm">
                        <option value="Makanan" {{ $produk->kategori == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                        <option value="Minuman" {{ $produk->kategori == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                    </select>
                </div>

                <!-- Stok -->
                <div>
                    <label for="stok" class="block text-sm font-semibold text-gray-700 mb-1">Jumlah Stok</label>
                    <input type="number" id="stok" name="stok" value="{{ old('stok', $produk->stok) }}" required min="0"
                        class="block w-full rounded-xl border border-gray-300 py-2.5 px-3.5 text-gray-900 shadow-sm focus:ring-2 focus:ring-emerald-600 text-sm">
                </div>
            </div>

            <!-- Harga -->
            <div>
                <label for="harga" class="block text-sm font-semibold text-gray-700 mb-1">Harga Satuan</label>
                <div class="relative rounded-xl shadow-sm">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                        <span class="text-gray-500 text-sm font-medium">Rp</span>
                    </div>
                    <input type="number" id="harga" name="harga" value="{{ old('harga', $produk->harga) }}" required min="0"
                        class="block w-full rounded-xl border border-gray-300 py-2.5 pl-10 pr-3.5 text-gray-900 focus:ring-2 focus:ring-emerald-600 text-sm">
                </div>
            </div>

            <!-- URL Gambar -->
            <div>
                <label for="img" class="block text-sm font-semibold text-gray-700 mb-1">Link URL Foto Produk</label>
                <input type="text" id="img" name="img" value="{{ old('img', $produk->img) }}"
                    class="block w-full rounded-xl border border-gray-300 py-2.5 px-3.5 text-gray-900 shadow-sm focus:ring-2 focus:ring-emerald-600 text-sm">
            </div>

            <!-- Tombol Submit -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                <a href="{{ route('penjual.produk.index') }}" class="text-sm font-semibold text-gray-600 hover:text-gray-900 px-4 py-2.5 rounded-xl hover:bg-gray-100 transition">Batal</a>
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 text-white px-5 py-2.5 rounded-xl text-sm font-semibold shadow-sm transition cursor-pointer">
                    Perbarui Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
