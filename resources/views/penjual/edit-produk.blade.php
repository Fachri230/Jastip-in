
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#d1fae5]/30 py-8 flex items-center justify-center">
    <div class="w-full max-w-xl bg-white p-8 rounded-2xl shadow-xl border border-gray-100 mx-4">

        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Edit Data Produk</h2>
            <p class="text-sm text-gray-500 mt-1">
                Perbarui atau sesuaikan informasi menu produk jastip Anda.
            </p>
        </div>

        <form action="{{ route('penjual.produk.update', $produk->id_produk) }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-5">

            @csrf
            @method('PUT')

            <!-- Nama Produk -->
            <div>
                <label for="nm_produk" class="block text-sm font-semibold text-gray-700 mb-1">
                    Nama Produk / Menu
                </label>

                <input type="text"
                       id="nm_produk"
                       name="nm_produk"
                       value="{{ old('nm_produk', $produk->nm_produk) }}"
                       required
                       class="block w-full rounded-xl border border-gray-300 py-2.5 px-3.5 text-gray-900 shadow-sm focus:ring-2 focus:ring-emerald-600 text-sm">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                <!-- Kategori -->
                <div>
                    <label for="kategori" class="block text-sm font-semibold text-gray-700 mb-1">
                        Kategori
                    </label>

                    <select id="kategori"
                            name="kategori"
                            required
                            class="block w-full rounded-xl border border-gray-300 py-2.5 px-3.5 text-gray-900 shadow-sm focus:ring-2 focus:ring-emerald-600 text-sm">

                        <option value="Makanan" {{ old('kategori', $produk->kategori) == 'Makanan' ? 'selected' : '' }}>
                            Makanan
                        </option>

                        <option value="Minuman" {{ old('kategori', $produk->kategori) == 'Minuman' ? 'selected' : '' }}>
                            Minuman
                        </option>
                    </select>
                </div>

                <!-- Stok -->
                <div>
                    <label for="stok" class="block text-sm font-semibold text-gray-700 mb-1">
                        Jumlah Stok
                    </label>

                    <input type="number"
                           id="stok"
                           name="stok"
                           value="{{ old('stok', $produk->stok) }}"
                           required
                           min="0"
                           class="block w-full rounded-xl border border-gray-300 py-2.5 px-3.5 text-gray-900 shadow-sm focus:ring-2 focus:ring-emerald-600 text-sm">
                </div>
            </div>

            <!-- Harga -->
            <div>
                <label for="harga" class="block text-sm font-semibold text-gray-700 mb-1">
                    Harga Satuan
                </label>

                <div class="relative rounded-xl shadow-sm">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                        <span class="text-gray-500 text-sm font-medium">Rp</span>
                    </div>

                    <input type="number"
                           id="harga"
                           name="harga"
                           value="{{ old('harga', $produk->harga) }}"
                           required
                           min="0"
                           class="block w-full rounded-xl border border-gray-300 py-2.5 pl-10 pr-3.5 text-gray-900 focus:ring-2 focus:ring-emerald-600 text-sm">
                </div>
            </div>

            <!-- Foto Produk -->
            <div>
                <label for="img" class="block text-sm font-semibold text-gray-700 mb-2">
                    Foto Produk
                </label>

                <input type="file"
                       name="img"
                       id="img"
                       accept="image/jpeg,image/png,image/webp"
                       class="block w-full text-sm text-gray-700 border border-gray-300 rounded-xl cursor-pointer bg-white
                              file:mr-4 file:py-2.5 file:px-4 file:border-0
                              file:rounded-l-xl file:bg-emerald-600 file:text-white
                              hover:file:bg-emerald-500">

                @if ($produk->img)
                    <div class="mt-4">
                        <p class="text-sm text-gray-600 mb-2">Foto saat ini:</p>

                        <img src="{{ asset('storage/' . $produk->img) }}"
                             alt="Foto Produk"
                             class="w-28 h-28 object-cover rounded-xl border border-gray-200">
                    </div>
                @endif

                @error('img')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">

                <a href="{{ route('penjual.produk.index') }}"
                   class="text-sm font-semibold text-gray-600 hover:text-gray-900 px-4 py-2.5 rounded-xl hover:bg-gray-100 transition">
                    Batal
                </a>

                <button type="submit"
                        class="bg-emerald-600 hover:bg-emerald-500 text-white px-5 py-2.5 rounded-xl text-sm font-semibold shadow-sm transition cursor-pointer">
                    Perbarui Perubahan
                </button>

            </div>
        </form>
    </div>
</div>
@endsection
