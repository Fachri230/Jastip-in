@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#d1fae5]/30 py-8 flex items-center justify-center">
    <div class="w-full max-w-xl bg-white p-8 rounded-2xl shadow-xl border border-gray-100 mx-4">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Tambah Produk Jastip</h2>
            <p class="text-sm text-gray-500 mt-1">Isi formulir dengan lengkap untuk mendaftarkan menu barang dagangan baru.</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-800 p-4 rounded-xl mb-4 text-sm font-medium">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('penjual.produk.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Nama Produk -->
            <div>
                <label for="nm_produk" class="block text-sm font-semibold text-gray-700 mb-1">Nama Produk / Menu</label>
                <input type="text" id="nm_produk" name="nm_produk" value="{{ old('nm_produk') }}" required placeholder="Contoh: Es Teh Solo / Makaroni Pedas"
                    class="block w-full rounded-xl border border-gray-300 py-2.5 px-3.5 text-gray-900 shadow-sm focus:ring-2 focus:ring-emerald-600 text-sm">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Kategori -->
                <div>
                    <label for="kategori" class="block text-sm font-semibold text-gray-700 mb-1">Kategori</label>
                    <select id="kategori" name="kategori" required class="block w-full rounded-xl border border-gray-300 py-2.5 px-3.5 text-gray-900 shadow-sm focus:ring-2 focus:ring-emerald-600 text-sm">
                        <option value="Makanan" {{ old('kategori') == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                        <option value="Minuman" {{ old('kategori') == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                    </select>
                </div>

                <!-- Stok -->
                <div>
                    <label for="stok" class="block text-sm font-semibold text-gray-700 mb-1">Kuantitas Stok</label>
                    <input type="number" id="stok" name="stok" value="{{ old('stok', 0) }}" required min="0"
                        class="block w-full rounded-xl border border-gray-300 py-2.5 px-3.5 text-gray-900 shadow-sm focus:ring-2 focus:ring-emerald-600 text-sm">
                </div>
            </div>

            <!-- Harga -->
            <div>
                <label for="harga" class="block text-sm font-semibold text-gray-700 mb-1">Harga Jual (Rupiah)</label>
                <div class="relative rounded-xl shadow-sm">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                        <span class="text-gray-500 text-sm font-medium">Rp</span>
                    </div>
                    <input type="number" id="harga" name="harga" value="{{ old('harga') }}" required min="0" placeholder="10000"
                        class="block w-full rounded-xl border border-gray-300 py-2.5 pl-10 pr-3.5 text-gray-900 focus:ring-2 focus:ring-emerald-600 text-sm">
                </div>
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="desc" class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi (Opsional)</label>
                <textarea id="desc" name="desc" rows="3" placeholder="Ceritakan singkat tentang produk ini"
                    class="block w-full rounded-xl border border-gray-300 py-2.5 px-3.5 text-gray-900 shadow-sm focus:ring-2 focus:ring-emerald-600 text-sm">{{ old('desc') }}</textarea>
            </div>

            <!-- URL Gambar -->
            <div>
                <label for="img" class="block text-sm font-semibold text-gray-700 mb-1">Link URL Foto Produk (Opsional)</label>
                <input type="text" id="img" name="img" value="{{ old('img') }}" placeholder="https://link-gambar.com"
                    class="block w-full rounded-xl border border-gray-300 py-2.5 px-3.5 text-gray-900 shadow-sm focus:ring-2 focus:ring-emerald-600 text-sm">
            </div>

            <!-- Tombol Submit -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                <a href="{{ route('penjual.produk.index') }}" class="text-sm font-semibold text-gray-600 hover:text-gray-900 px-4 py-2.5 rounded-xl hover:bg-gray-100 transition">Batal</a>
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 text-white px-5 py-2.5 rounded-xl text-sm font-semibold shadow-sm transition cursor-pointer">
                    Simpan Produk
                </button>
            </div>
        </form>
    </div>
</div>
@endsection