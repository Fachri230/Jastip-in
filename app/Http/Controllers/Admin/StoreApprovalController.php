<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreApprovalController extends Controller
{
    public function index()
    {
        $stores = Store::with('user')
            ->orderByRaw("FIELD(status, 'pending', 'rejected', 'approved')")
            ->latest()
            ->get();

        return view('admin.stores.index', compact('stores'));
    }

    public function approve(Store $store)
    {
        DB::transaction(function () use ($store) {
            $store->update(['status' => 'approved', 'rejection_reason' => null]);
            $store->user->update(['role' => 'seller']);
        });

        return back()->with('success', "Toko {$store->store_name} disetujui.");
    }

    public function reject(Request $request, Store $store)
    {
        $request->validate(['rejection_reason' => 'required|string|max:255']);

        $store->update([
            'status' => 'rejected',
            'rejection_reason' => $request->rejection_reason,
        ]);

        return back()->with('success', "Toko {$store->store_name} ditolak.");
    }
}