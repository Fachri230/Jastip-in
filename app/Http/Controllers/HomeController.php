<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Menu;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $menus = Menu::paginate(8);
        $user = Auth::user();

        return view('siswa.index', compact('user', 'menus'));
    }

    
    public function formDaftarToko()
    {
        $user = Auth::user();
        
       
        if ($user->role === 'pending' || $user->role === 'seller') {
            return redirect('/menu')->with('info', 'Anda sudah mendaftar atau sudah menjadi penjual.');
        }

        return view('siswa.daftar-toko');
    }

    
    public function prosesDaftarToko(Request $request)
    {
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'no_hp'     => 'required|numeric',
            'deskripsi' => 'required|string',
        ]);

        $user = Auth::user();
        
        
        $user->role = 'pending';
        
       
        
        $user->save();

        return redirect('/menu')->with('success', 'Pendaftaran toko berhasil dikirim! Mohon tunggu persetujuan dari Admin.');
    }
}
