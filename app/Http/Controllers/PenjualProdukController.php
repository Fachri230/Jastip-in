<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenjualProdukController extends Controller
{
    private function penjualId()
    {
        abort_unless(Auth::check(), 403);

        abort_unless(
            Auth::user()->role === 'penjual',
            403,
            'Halaman ini hanya untuk penjual.'
        );

        return Auth::id();
    }

    public function index()
    {
        $idUser = $this->penjualId();

        $produks = Menu::where('id_user', $idUser)
            ->latest()
            ->get();

        return view('penjual.produk', compact('produks'));
    }

    public function create()
    {
        $this->penjualId();

        return view('penjual.tambah-produk');
    }

    public function store(Request $request)
    {
        $idUser = $this->penjualId();

        $data = $request->validate([
            'nm_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'desc' => 'nullable|string',
            'kategori' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'img' => 'nullable|string|max:255',
        ]);

        $data['id_user'] = $idUser;

        Menu::create($data);

        return redirect()
            ->route('penjual.produk.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $idUser = $this->penjualId();

        $produk = Menu::where('id_user', $idUser)
            ->where('id_produk', $id)
            ->firstOrFail();

        return view('penjual.edit-produk', compact('produk'));
    }

    public function update(Request $request, string $id)
    {
        $idUser = $this->penjualId();

        $produk = Menu::where('id_user', $idUser)
            ->where('id_produk', $id)
            ->firstOrFail();

        $data = $request->validate([
            'nm_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'desc' => 'nullable|string',
            'kategori' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'img' => 'nullable|string|max:255',
        ]);

        $produk->update($data);

        return redirect()
            ->route('penjual.produk.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $idUser = $this->penjualId();

        $produk = Menu::where('id_user', $idUser)
            ->where('id_produk', $id)
            ->firstOrFail();

        $produk->delete();

        return redirect()
            ->route('penjual.produk.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}

