<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Data contoh — nanti diganti query database asli
    private function dummyOrders()
    {
        return [
            [
                'id' => 1, 'no' => 1,
                'nama_pesanan' => 'ayam geprek', 'pelanggan' => 'andi setiawan',
                'no_hp' => '0812-2875-9542', 'total' => 16000, 'status' => 'baru',
                'waktu' => '10:22', 'invoice' => 'INV/2026/001',
                'kelas' => 'xi-rpa', 'lokasi_ambil' => 'ambil ke kantin',
                'items' => [['nama' => 'Ayam Geprek', 'qty' => 1, 'subtotal' => 16000]],
            ],
            [
                'id' => 2, 'no' => 2,
                'nama_pesanan' => 'nasi goreng', 'pelanggan' => 'dewi lestari',
                'no_hp' => '0813-1122-3344', 'total' => 14000, 'status' => 'diproses',
                'waktu' => '09:30', 'invoice' => 'INV/2026/002',
                'kelas' => 'x-rpa', 'lokasi_ambil' => 'ambil ke kantin',
                'items' => [
                    ['nama' => 'Nasi Goreng', 'qty' => 2, 'subtotal' => 30000],
                    ['nama' => 'Es Teh', 'qty' => 1, 'subtotal' => 5000],
                ],
            ],
            [
                'id' => 3, 'no' => 3,
                'nama_pesanan' => 'mie ayam', 'pelanggan' => 'riki pratama',
                'no_hp' => '0821-5566-7788', 'total' => 12000, 'status' => 'siap_diambil',
                'waktu' => '11:40', 'invoice' => 'INV/2026/003',
                'kelas' => 'xii-rpl', 'lokasi_ambil' => 'ambil ke kantin',
                'items' => [['nama' => 'Mie Ayam', 'qty' => 1, 'subtotal' => 12000]],
            ],
            [
                'id' => 4, 'no' => 4,
                'nama_pesanan' => 'es teh', 'pelanggan' => 'fajar maulana',
                'no_hp' => '0822-3344-5566', 'total' => 5000, 'status' => 'selesai',
                'waktu' => '12:10', 'invoice' => 'INV/2026/004',
                'kelas' => 'x-rpl', 'lokasi_ambil' => 'ambil ke kantin',
                'items' => [['nama' => 'Es Teh', 'qty' => 1, 'subtotal' => 5000]],
            ],
            [
                'id' => 5, 'no' => 5,
                'nama_pesanan' => 'mie goreng', 'pelanggan' => 'aril wijaya',
                'no_hp' => '0856-1234-5678', 'total' => 8000, 'status' => 'dibatalkan',
                'waktu' => '13:00', 'invoice' => 'INV/2026/005',
                'kelas' => 'xi-rpl', 'lokasi_ambil' => 'ambil ke kantin',
                'items' => [['nama' => 'Mie Goreng', 'qty' => 1, 'subtotal' => 8000]],
            ],
        ];
    }

 
    public function index(Request $request)
    {
        $orders = $this->dummyOrders();

        if ($request->filled('status') && $request->status !== 'semua') {
            $orders = array_values(array_filter($orders, fn($o) => $o['status'] === $request->status));
        }

        return view('orders.index', [
            'orders' => $orders,
            'activeStatus' => $request->get('status', 'semua'),
        ]);
    }

    public function show($id)
    {
        $order = collect($this->dummyOrders())->firstWhere('id', (int) $id);
        return response()->json($order);
    }
}