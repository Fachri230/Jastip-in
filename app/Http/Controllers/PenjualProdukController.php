<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class PenjualProdukController extends Controller
{
    public function index()
    {
        $produks = Menu::latest()->get();

        return view('penjual.produk', compact('produks'));
    }

    public function create()
    {
        return view('penjual.tambah-produk');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nm_produk' => 'required|string|max:255',
            'kategori'  => 'required|string',
            'stok'      => 'required|integer|min:0',
            'harga'     => 'required|integer|min:0',
            'desc'      => 'nullable|string',
            'img'       => 'nullable|string|max:2048',
        ]);

        $data['id_user'] = auth()->id();

        Menu::create($data);

        return redirect()->route('penjual.produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $produk = Menu::findOrFail($id);

        return view('penjual.edit-produk', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $produk = Menu::findOrFail($id);

        $data = $request->validate([
            'nm_produk' => 'required|string|max:255',
            'kategori'  => 'required|string',
            'stok'      => 'required|integer|min:0',
            'harga'     => 'required|integer|min:0',
            'desc'      => 'nullable|string',
            'img'       => 'nullable|string|max:2048',
        ]);

        $produk->update($data);

        return redirect()->route('penjual.produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('penjual.produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}