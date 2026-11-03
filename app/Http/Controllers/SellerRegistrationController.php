<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SellerRegistrationController extends Controller
{
    public function create()
    {
        $user = auth()->user();

        if ($user->role === 'seller') {
            return redirect()->route('penjual.produk.index');
        }

        // Jika sudah pernah mengajukan, tampilkan halaman status
        if ($user->store && $user->store->status === 'pending') {
            return redirect()->route('seller.status');
        }

        // Jika ditolak, form terisi data lama supaya bisa diajukan ulang
        return view('auth.become-seller', ['store' => $user->store]);
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        if ($user->store && $user->store->status === 'pending') {
            return redirect()->route('seller.status');
        }

        $request->validate([
            'store_name'  => 'required|string|max:100|unique:stores,store_name,' . optional($user->store)->id_store . ',id_store',
            'description' => 'nullable|string|max:500',
            'address'     => 'required|string|max:255',
            'phone'       => ['required', 'regex:/^(08|62)[0-9]{8,13}$/'],
            'logo'        => 'nullable|image|max:2048',
        ], [
            'phone.regex' => 'Nomor telepon harus diawali 08 atau 62 dan hanya berisi angka.',
        ]);

        $data = [
            'store_name'       => $request->store_name,
            'slug'             => Str::slug($request->store_name),
            'description'      => $request->description,
            'address'          => $request->address,
            'phone'            => $request->phone,
            'status'           => 'pending',
            'rejection_reason' => null,
        ];

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logo-toko', 'public');
        }

        // updateOrCreate: pengajuan baru atau pengajuan ulang setelah ditolak
        Store::updateOrCreate(['user_id' => $user->id_user], $data);

        // Role TIDAK diubah di sini, menunggu admin
        return redirect()->route('seller.status')
            ->with('success', 'Pengajuan toko terkirim. Mohon tunggu persetujuan admin.');
    }

    public function status()
    {
        $store = auth()->user()->store;

        if (!$store) {
            return redirect()->route('seller.register');
        }

        return view('auth.seller-status', compact('store'));
    }
}