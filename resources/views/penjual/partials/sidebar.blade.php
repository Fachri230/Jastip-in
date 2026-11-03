
<style>
    .layout > .sidebar {
        width: 250px;
        min-width: 250px;
        flex: 0 0 250px;
        min-height: 100vh;
        padding: 28px 18px;
        background: #087443;
        color: #fff;
        box-sizing: border-box;
    }

    .sidebar .brand {
        font-size: 25px;
        font-weight: 800;
        margin: 0 12px 8px;
        color: #fff;
    }

    .sidebar .brand span {
        color: #a7f3c5;
        margin-left: 0;
        padding-left: 0;
    }

    .sidebar .brand-subtitle {
        font-size: 12px;
        color: #d1fae5;
        margin: 0 12px 38px;
    }

    .sidebar .menu-title {
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #c1e8d2;
        margin: 22px 12px 12px;
    }

    .sidebar .nav-link {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 13px 14px;
        margin-bottom: 7px;
        border-radius: 9px;
        font-size: 14px;
        color: #e4f7eb;
        text-decoration: none;
        background: transparent;
        transition: background .2s, color .2s;
    }

    .sidebar .nav-link:hover {
        background: rgba(255, 255, 255, .14);
        color: #fff;
    }

    .sidebar .nav-link.active {
        background: #fff;
        color: #087443;
        font-weight: 700;
    }

    .sidebar .nav-icon {
        width: 22px;
        min-width: 22px;
        text-align: center;
        font-size: 18px;
    }

    .sidebar .sidebar-footer {
        margin: 45px 10px 0;
        padding-top: 20px;
        border-top: 1px solid #38966a;
        font-size: 12px;
        line-height: 1.8;
        color: #d1fae5;
    }

    @media (max-width: 1000px) {
        .layout > .sidebar {
            width: 210px;
            min-width: 210px;
            flex-basis: 210px;
        }
    }

    @media (max-width: 760px) {
        .layout > .sidebar {
            width: 100%;
            min-width: 0;
            min-height: auto;
            flex-basis: auto;
            padding: 17px;
        }

        .sidebar .brand-subtitle {
            margin-bottom: 16px;
        }

        .sidebar .menu-title,
        .sidebar .sidebar-footer {
            display: none;
        }

        .sidebar .sidebar-nav {
            display: flex;
            gap: 7px;
            overflow-x: auto;
        }

        .sidebar .nav-link {
            flex-shrink: 0;
            white-space: nowrap;
            margin: 0;
            padding: 10px 12px;
        }
    }
</style>

<aside class="sidebar">
    <div class="brand">Jastip-in<span></span></div>
    <div class="brand-subtitle">Merchant Dashboard</div>
    <div class="menu-title">Menu Utama</div>

    <nav class="sidebar-nav">
        <a href="{{ route('penjual.dashboard') }}"
           class="nav-link {{ request()->routeIs('penjual.dashboard') ? 'active' : '' }}">
            <span class="nav-icon">▦</span>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('penjual.pesanan.index') }}"
           class="nav-link {{ request()->routeIs('penjual.pesanan.*') ? 'active' : '' }}">
            <span class="nav-icon">▤</span>
            <span>Manajemen Pesanan</span>
        </a>

        <a href="{{ route('penjual.produk.index') }}"
           class="nav-link {{ request()->routeIs('penjual.produk.index', 'penjual.produk.edit', 'penjual.produk.update') ? 'active' : '' }}">
            <span class="nav-icon">☷</span>
            <span>Kelola Produk</span>
        </a>

        <a href="{{ route('penjual.produk.create') }}"
           class="nav-link {{ request()->routeIs('penjual.produk.create', 'penjual.produk.store') ? 'active' : '' }}">
            <span class="nav-icon">＋</span>
            <span>Tambah Produk</span>
        </a>
    </nav>

    <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="nav-link logout-link">
        <span class="nav-icon">↪</span>
        Logout
    </button>
</form>

    <div class="sidebar-footer">
        <strong>Jastip-in</strong><br>
        Kelola produk kantin dengan mudah.
    </div>
</aside>
