@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#d1fae5]/30 py-8 flex items-center justify-center">
    <div class="w-full max-w-xl bg-white p-8 rounded-2xl shadow-xl border border-gray-100 mx-4">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Tambah Managemen Stok</h2>
            <p class="text-sm text-gray-500 mt-1">Input kuantitas barang logistik masuk baru.</p>
        </div>

        <form action="{{ route('crud-stock.store') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Barang / Produk</label>
                <input type="text" name="nama_barang" required placeholder="Contoh: Bubble Wrap / Dus Packing" class="block w-full rounded-xl border border-gray-300 py-2.5 px-3.5 text-sm focus:ring-2 focus:ring-emerald-600">
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Jumlah Volume</label>
                    <input type="number" name="jumlah" required min="0" value="0" class="block w-full rounded-xl border border-gray-300 py-2.5 px-3.5 text-sm focus:ring-2 focus:ring-emerald-600">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Satuan</label>
                    <input type="text" name="satuan" required placeholder="Contoh: Pcs / Kg / Box" class="block w-full rounded-xl border border-gray-300 py-2.5 px-3.5 text-sm focus:ring-2 focus:ring-emerald-600">
                </div>
            </div>
            <div class="flex items-center justify-end gap-3 pt-4 border-t">
                <a href="{{ route('crud-stock.index') }}" class="text-sm font-semibold text-gray-600 px-4 py-2.5 rounded-xl hover:bg-gray-100 transition">Batal</a>
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 text-white px-5 py-2.5 rounded-xl text-sm font-semibold shadow-sm transition">Simpan Data</button>
            </div>
        </form>
    </div>
</div>
@endsection
