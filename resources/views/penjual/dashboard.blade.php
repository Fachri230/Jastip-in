<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penjual - Jastip-in</title>

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7f5;
            color: #24352c;
        }

        a { text-decoration: none; color: inherit; }

        .layout {
            display: flex;
            min-height: 100vh;
            width: 100%;
        }

        .sidebar {
            width: 250px;
            background: #087443;
            color: white;
            padding: 28px 18px;
            flex-shrink: 0;
        }

        .brand {
            font-size: 25px;
            font-weight: bold;
            margin: 0 12px 8px;
        }

        .brand span { color: #a7f3c5; }

        .brand-subtitle {
            font-size: 12px;
            color: #d1fae5;
            margin: 0 12px 38px;
        }

        .menu-title {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #c1e8d2;
            margin: 22px 12px 12px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 14px;
            margin-bottom: 7px;
            border-radius: 9px;
            font-size: 14px;
            color: #e4f7eb;
            transition: .2s;
        }

        .nav-link:hover,
        .nav-link.active {
            background: white;
            color: #087443;
        }

        .logout-link {
    width: 100%;
    border: none;
    background: transparent;
    color: #e4f7eb;
    text-align: left;
    font: inherit;
    cursor: pointer;
}

.logout-link:hover {
    background: rgba(255, 255, 255, 0.15);
    color: white;
}

        .nav-icon {
            width: 22px;
            text-align: center;
            font-size: 18px;
        }

        .sidebar-footer {
            margin: 45px 10px 0;
            padding-top: 20px;
            border-top: 1px solid #38966a;
            font-size: 12px;
            line-height: 1.8;
            color: #d1fae5;
        }

        .main { flex: 1; min-width: 0; margin-left: 0; }

        .topbar {
            background: white;
            padding: 20px 34px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            border-bottom: 1px solid #e6ece8;
        }

        .topbar h2 { font-size: 20px; }

        .topbar p {
            color: #78877e;
            font-size: 13px;
            margin-top: 5px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #d9f8e5;
            color: #087443;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 18px;
        }

        .profile-name { font-weight: bold; font-size: 13px; }

        .profile-role {
            color: #849087;
            font-size: 12px;
            margin-top: 4px;
        }

        .content {
            padding: 24px;
            width: 100%;
            box-sizing: border-box;
        }

        .welcome {
            background: linear-gradient(115deg, #087443, #16a05b);
            color: white;
            border-radius: 16px;
            padding: 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 28px;
            box-shadow: 0 8px 22px rgba(8,116,67,.12);
        }

        .welcome h1 { font-size: 25px; margin-bottom: 10px; }

        .welcome p {
            font-size: 14px;
            color: #e0f7e9;
            line-height: 1.7;
        }

        .welcome-icon { font-size: 65px; }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: none;
            border-radius: 9px;
            padding: 12px 17px;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-green { background: #087443; color: white; }
        .btn-green:hover { background: #065c35; }
        .btn-white { background: white; color: #087443; margin-top: 18px; }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 18px;
        }

        .section-heading h2 { font-size: 19px; }

        .section-heading p {
            font-size: 13px;
            color: #819087;
            margin-top: 5px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: white;
            border: 1px solid #e8eee9;
            border-radius: 13px;
            padding: 22px;
            display: flex;
            align-items: center;
            gap: 16px;
            box-shadow: 0 3px 12px rgba(30,70,45,.03);
        }

        .stat-icon {
            width: 52px;
            height: 52px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            flex-shrink: 0;
        }

        .icon-green { background: #dcfce7; }
        .icon-orange { background: #fff0d5; }
        .icon-blue { background: #dbeafe; }

        .stat-label {
            color: #78877e;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .stat-number {
            font-size: 27px;
            font-weight: bold;
            color: #203b2b;
        }

        .stat-description {
            font-size: 11px;
            color: #8a968e;
            margin-top: 5px;
        }

        .panel {
            background: white;
            border: 1px solid #e8eee9;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 3px 12px rgba(30,70,45,.03);
        }

        .panel-header {
            padding: 22px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            border-bottom: 1px solid #edf1ee;
        }

        .panel-header h2 { font-size: 17px; }

        .panel-header p {
            color: #879289;
            font-size: 12px;
            margin-top: 5px;
        }

        .table-wrapper { width: 100%; overflow-x: auto; }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            white-space: nowrap;
        }

        thead { background: #f8faf8; }

        th {
            color: #748177;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .5px;
            padding: 15px 20px;
        }

        td {
            padding: 15px 20px;
            border-top: 1px solid #edf1ee;
            font-size: 13px;
        }

        .product-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .product-image {
            width: 48px;
            height: 48px;
            border-radius: 9px;
            object-fit: cover;
            background: #edf4ef;
            border: 1px solid #e8eee9;
            flex-shrink: 0;
        }

        .product-name {
            font-weight: bold;
            max-width: 180px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .product-category {
            font-size: 11px;
            color: #89958c;
            margin-top: 5px;
        }

        .price { font-weight: bold; color: #087443; }

        .stock-badge {
            display: inline-block;
            background: #dcfce7;
            color: #087443;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
        }

        .stock-low { background: #fff0d5; color: #a45c00; }

        .action-link {
            display: inline-block;
            color: #087443;
            background: #e8f8ee;
            padding: 8px 11px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: bold;
        }

        .empty-state {
            text-align: center;
            padding: 45px 20px;
            color: #829087;
            white-space: normal;
        }

        .empty-state h3 { margin: 12px 0 8px; color: #344b3b; }
        .empty-state p { font-size: 13px; margin-bottom: 20px; }
        .empty-icon { font-size: 45px; }

        .footer {
            padding: 25px 10px;
            text-align: center;
            font-size: 12px;
            color: #89958d;
        }

        .alert-success {
            background: #dcfce7;
            border: 1px solid #bbf7d0;
            color: #166534;
            padding: 13px 16px;
            border-radius: 9px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        @media (max-width: 1000px) {
            .sidebar { width: 210px; }
            .content { padding: 24px 20px; }
            .stats { gap: 12px; }
            .stat-card { padding: 17px; gap: 11px; }
            .stat-number { font-size: 23px; }
        }

        @media (max-width: 760px) {
            .layout { flex-direction: column; }
            .sidebar { width: 100%; padding: 17px; }
            .brand { margin-bottom: 5px; }
            .brand-subtitle { margin-bottom: 16px; }
            .menu-title { display: none; }
            .sidebar nav {
                display: flex;
                gap: 7px;
                overflow-x: auto;
            }
            .nav-link {
                white-space: nowrap;
                margin: 0;
                padding: 10px 12px;
            }
            .sidebar-footer { display: none; }
            .topbar { padding: 17px 20px; }
            .content { padding: 20px 14px; }
            .welcome { padding: 24px 20px; }
            .welcome h1 { font-size: 21px; }
            .welcome-icon { font-size: 43px; }
            .stats { grid-template-columns: 1fr; }
            .stat-card { padding: 19px; }
        }

        @media (max-width: 430px) {
            .profile-name, .profile-role, .welcome-icon { display: none; }
            .welcome h1 { font-size: 19px; }
            .panel-header { flex-direction: column; align-items: flex-start; }
        }
    </style>
</head>
<body>
<div class="layout">

    
@include('penjual.partials.sidebar')

    <main class="main">

        <header class="topbar">
            <div>
                <h2>Dashboard Penjual</h2>
                <p>Ringkasan usaha dan produk kamu</p>
            </div>

            <div class="profile">
                <div class="avatar">
                    {{ strtoupper(substr(auth()->user()->nama ?? auth()->user()->name ?? 'P', 0, 1)) }}
                </div>
                <div>
                    <div class="profile-name">
                        {{ auth()->user()->nama ?? auth()->user()->name ?? 'Penjual' }}
                    </div>
                    <div class="profile-role">Akun Penjual</div>
                </div>
            </div>
        </header>

        <div class="content">
            @if (session('success'))
                <div class="alert-success">{{ session('success') }}</div>
            @endif

            <section class="welcome">
                <div>
                    <h1>
                        Selamat datang,
                        {{ auth()->user()->nama ?? auth()->user()->name ?? 'Penjual' }}! 👋
                    </h1>
                    <p>
                        Pantau produk dan stok jualanmu dari satu tempat.
                        Yuk, pastikan semua produk siap dipesan pelanggan.
                    </p>
                    <a href="{{ route('penjual.produk.create') }}" class="btn btn-white">
                        ＋ Tambah Produk Baru
                    </a>
                </div>
                <div class="welcome-icon">🛍️</div>
            </section>

            <div class="section-heading">
                <div>
                    <h2>Ringkasan Toko</h2>
                    <p>Informasi produk yang kamu kelola</p>
                </div>
            </div>

            <section class="stats">
                <div class="stat-card">
                    <div class="stat-icon icon-green">📦</div>
                    <div>
                        <div class="stat-label">Total Produk</div>
                        <div class="stat-number">{{ $totalProduk }}</div>
                        <div class="stat-description">Produk terdaftar</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon icon-blue">🗃️</div>
                    <div>
                        <div class="stat-label">Total Stok</div>
                        <div class="stat-number">{{ $totalStok }}</div>
                        <div class="stat-description">Jumlah seluruh stok</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon icon-orange">⚠️</div>
                    <div>
                        <div class="stat-label">Stok Menipis</div>
                        <div class="stat-number">{{ $stokMenipis }}</div>
                        <div class="stat-description">Stok 5 atau kurang</div>
                    </div>
                </div>
            </section>

            <section>
                <div class="section-heading">
                    <div>
                        <h2>Produk Terbaru</h2>
                        <p>Lima produk terakhir yang kamu tambahkan</p>
                    </div>
                    <a href="{{ route('penjual.produk.index') }}" class="btn btn-green">
                        Lihat Semua
                    </a>
                </div>

                <div class="panel">
                    <div class="panel-header">
                        <div>
                            <h2>Daftar Produk</h2>
                            <p>Informasi nama, harga, dan stok produk</p>
                        </div>
                        <a href="{{ route('penjual.produk.create') }}" class="btn btn-green">
                            ＋ Tambah Produk
                        </a>
                    </div>

                    <div class="table-wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($produksTerbaru as $produk)
                                    <tr>
                                        <td>
                                            <div class="product-info">
                                                @php
                                                    $gambar = $produk->img;
                                                    $gambarUrl = $gambar
                                                        ? (str_starts_with($gambar, 'http://') || str_starts_with($gambar, 'https://')
                                                            ? $gambar
                                                            : asset('storage/' . $gambar))
                                                        : null;
                                                @endphp

                                                @if ($gambarUrl)
                                                    <img
                                                        src="{{ $gambarUrl }}"
                                                        alt="{{ $produk->nm_produk }}"
                                                        class="product-image"
                                                        onerror="this.style.display='none';"
                                                    >
                                                @else
                                                    <div class="product-image" style="display:flex;align-items:center;justify-content:center;font-size:22px;">
                                                        🍽️
                                                    </div>
                                                @endif

                                                <div>
                                                    <div class="product-name">{{ $produk->nm_produk }}</div>
                                                    <div class="product-category">
                                                        {{ $produk->desc ?: 'Tidak ada deskripsi' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="price">
                                            Rp {{ number_format((float) $produk->harga, 0, ',', '.') }}
                                        </td>
                                        <td>
                                            <span class="stock-badge {{ $produk->stok <= 5 ? 'stock-low' : '' }}">
                                                {{ $produk->stok }} tersedia
                                            </span>
                                        </td>
                                        <td>{{ $produk->kategori }}</td>
                                        <td>
                                            <a href="{{ route('penjual.produk.edit', $produk->id_produk) }}" class="action-link">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <div class="empty-state">
                                                <div class="empty-icon">🛍️</div>
                                                <h3>Belum Ada Produk</h3>
                                                <p>
                                                    Kamu belum menambahkan produk.
                                                    Mulai tambahkan produk pertamamu sekarang.
                                                </p>
                                                <a href="{{ route('penjual.produk.create') }}" class="btn btn-green">
                                                    ＋ Tambah Produk
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <footer class="footer">
                &copy; {{ date('Y') }} Jastip-in. Dashboard Penjual.
            </footer>
        </div>
    </main>
</div>
</body>
</html>
