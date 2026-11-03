<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PenjualProdukController extends Controller
{
    // Memastikan hanya penjual yang bisa mengakses halaman ini.
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

    // DASHBOARD PENJUAL
    public function dashboard()
    {
        $idUser = $this->penjualId();

        $query = Menu::where('id_user', $idUser);

        $totalProduk = (clone $query)->count();
        $totalStok = (clone $query)->sum('stok');

        $stokMenipis = (clone $query)
            ->where('stok', '<=', 5)
            ->count();

        $produksTerbaru = (clone $query)
            ->latest()
            ->take(5)
            ->get();

        return view('penjual.dashboard', compact(
            'totalProduk',
            'totalStok',
            'stokMenipis',
            'produksTerbaru'
        ));
    }

    // MENAMPILKAN PRODUK
    public function index()
    {
        $idUser = $this->penjualId();

        $produks = Menu::where('id_user', $idUser)
            ->latest()
            ->get();

        return view('penjual.produk', compact('produks'));
    }

    // HALAMAN TAMBAH PRODUK
    public function create()
    {
        $this->penjualId();

        return view('penjual.tambah-produk');
    }

    // MENYIMPAN PRODUK
    public function store(Request $request)
    {
        $idUser = $this->penjualId();

        $data = $request->validate([
            'nm_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'desc' => 'nullable|string',
            'kategori' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')
                ->store('produk', 'public');
        }

        $data['id_user'] = $idUser;

        Menu::create($data);

        return redirect()
            ->route('penjual.produk.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    // HALAMAN EDIT PRODUK
    public function edit($id)
    {
        $idUser = $this->penjualId();

        $produk = Menu::where('id_user', $idUser)
            ->where('id_produk', $id)
            ->firstOrFail();

        return view('penjual.edit-produk', compact('produk'));
    }

    // MEMPERBARUI PRODUK
    public function update(Request $request, $id)
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
            'img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Jangan mengubah gambar jika tidak ada gambar baru.
        unset($data['img']);

        if ($request->hasFile('img')) {
            if (
                $produk->img &&
                !str_starts_with($produk->img, 'http://') &&
                !str_starts_with($produk->img, 'https://')
            ) {
                Storage::disk('public')->delete($produk->img);
            }

            $data['img'] = $request->file('img')
                ->store('produk', 'public');
        }

        $produk->update($data);

        return redirect()
            ->route('penjual.produk.index')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    // MENGHAPUS PRODUK
    public function destroy($id)
    {
        $idUser = $this->penjualId();

        $produk = Menu::where('id_user', $idUser)
            ->where('id_produk', $id)
            ->firstOrFail();

        if (
            $produk->img &&
            !str_starts_with($produk->img, 'http://') &&
            !str_starts_with($produk->img, 'https://')
        ) {
            Storage::disk('public')->delete($produk->img);
        }

        $produk->delete();

        return redirect()
            ->route('penjual.produk.index')
            ->with('success', 'Produk berhasil dihapus!');
    }
}