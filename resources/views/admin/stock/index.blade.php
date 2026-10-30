@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#d1fae5]/30 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Manajemen Stok Barang</h1>
                <p class="text-sm text-gray-500 mt-1">Pantau ketersediaan kuantitas logistik atau produk jastip.</p>
            </div>
            <a href="{{ route('crud-stock.create') }}" class="bg-emerald-600 hover:bg-emerald-500 text-white px-5 py-2.5 rounded-xl text-sm font-semibold shadow-sm transition">
                + Tambah Stok
            </a>
        </div>

        @if(session('success'))
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-4 rounded-xl mb-6 text-sm font-medium">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-emerald-600 text-white text-xs font-semibold uppercase tracking-wider">
                        <th class="p-4">Nama Barang</th>
                        <th class="p-4">Volume / Jumlah</th>
                        <th class="p-4">Status</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                    @forelse($stocks as $stock)
                    <tr class="hover:bg-gray-50/70 transition">
                        <td class="p-4 font-semibold text-gray-900">{{ $stock->nama_barang }}</td>
                        <td class="p-4 font-medium">{{ $stock->jumlah }} {{ $stock->satuan }}</td>
                        <td class="p-4">
                            <span class="px-2.5 py-1 rounded-md text-xs font-semibold {{ $stock->status === 'Tersedia' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $stock->status }}
                            </span>
                        </td>
                        <td class="p-4 text-center space-x-3 font-medium">
                            <a href="{{ route('crud-stock.edit', $stock->id) }}" class="text-emerald-600 hover:text-emerald-700">Edit</a>
                            <form action="{{ route('crud-stock.destroy', $stock->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus barang ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-600 cursor-pointer">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="p-8 text-center text-gray-400">Belum ada pencatatan stok logistik.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
