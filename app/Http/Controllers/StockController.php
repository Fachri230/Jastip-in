<?php

namespace App\Http\Controllers;

use App\Models\Stock; // Pastikan model Stock sudah ada, jika belum jalankan: php artisan make:model Stock
use Illuminate\Http\Request;

class StockController extends Controller
{
   public function index()
{
    // 🔴 Ambil data langsung dari tabel database stocks
    $stocks = \App\Models\Stock::latest()->get(); 
    
    // Pastikan diarahkan ke folder admin.stock.index
    return view('admin.stock.index', compact('stocks'));
}


    public function create()
    {
        return view('admin.stock.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jumlah'      => 'required|numeric|min:0',
            'satuan'      => 'required|string'
        ]);

        if (class_exists(Stock::class)) {
            Stock::create([
                'nama_barang' => $request->nama_barang,
                'jumlah'      => $request->jumlah,
                'satuan'      => $request->satuan,
                'status'      => $request->jumlah > 0 ? 'Tersedia' : 'Habis',
            ]);
        }

        return redirect()->route('crud-stock.index')->with('success', 'Stok barang berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $stock = Stock::findOrFail($id);
        return view('admin.stock.edit', compact('stock'));
    }

    public function update(Request $request, $id)
    {
        $stock = Stock::findOrFail($id);

        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jumlah'      => 'required|numeric|min:0',
            'satuan'      => 'required|string'
        ]);

        $stock->update([
            'nama_barang' => $request->nama_barang,
            'jumlah'      => $request->jumlah,
            'satuan'      => $request->satuan,
            'status'      => $request->jumlah > 0 ? 'Tersedia' : 'Habis',
        ]);

        return redirect()->route('crud-stock.index')->with('success', 'Stok berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $stock = Stock::findOrFail($id);
        $stock->delete();
        return redirect()->route('crud-stock.index')->with('success', 'Stok berhasil dihapus!');
    }
}
