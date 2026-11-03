
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Produk | Jastip-in</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', Arial, sans-serif;
            color: #172b29;
            background: #f4f5f7;
        }

        a {
            text-decoration: none;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .layout > .sidebar {
            width: 250px;
            min-width: 250px;
            flex: 0 0 250px;
            min-height: 100vh;
            background: #087443;
            color: white;
        }

        /* MAIN */
        .main {
            flex: 1;
            min-width: 0;
        }

        .topbar {
            min-height: 105px;
            background: white;
            border-bottom: 1px solid #e0e5e9;
            padding: 22px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
        }

        .topbar h1 {
            color: #172b43;
            font-size: 24px;
            margin-bottom: 7px;
        }

        .topbar p {
            font-size: 14px;
            color: #718096;
        }

        .seller-badge {
            background: #e8f7ed;
            color: #087443;
            padding: 12px 18px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .content {
            max-width: 1500px;
            padding: 30px;
            margin: 0 auto;
        }

        /* ALERT */
        .alert-success {
            background: #e7f7e9;
            color: #176b2b;
            border: 1px solid #c6edcc;
            border-radius: 12px;
            padding: 14px 17px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .alert-error {
            background: #fff0f0;
            color: #b91c1c;
            border: 1px solid #fecaca;
            border-radius: 12px;
            padding: 14px 17px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        /* TOOLBAR */
        .toolbar {
            background: white;
            border-radius: 21px;
            padding: 20px;
            display: flex;
            gap: 20px;
            align-items: center;
            margin-bottom: 30px;
            box-shadow: 0 2px 3px #152d2510;
        }

        .search-box {
            flex: 1;
            min-width: 0;
            position: relative;
        }

        .search-box span {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #8b99aa;
            font-size: 20px;
        }

        .search-box input {
            width: 100%;
            padding: 13px 15px 13px 45px;
            border: 1px solid #dfe5eb;
            background: #f9fafb;
            border-radius: 15px;
            font: inherit;
            font-size: 14px;
            outline: none;
        }

        .search-box input:focus {
            border-color: #00ad24;
            background: white;
        }

        .btn-add {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 9px;
            background: #00ad24;
            color: white;
            border-radius: 14px;
            padding: 14px 21px;
            font-size: 14px;
            font-weight: 700;
            white-space: nowrap;
            transition: background .2s;
        }

        .btn-add:hover {
            background: #008e1d;
        }

        /* PRODUCT HEADING */
        .section-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 20px;
        }

        .section-heading h2 {
            font-size: 19px;
            color: #25364b;
        }

        .product-count {
            color: #667587;
            background: white;
            border: 1px solid #e4e8ec;
            border-radius: 20px;
            padding: 7px 12px;
            font-size: 12px;
        }

        /* PRODUCT CARDS */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
        }

        .product-card {
            min-width: 0;
            background: white;
            border-radius: 21px;
            overflow: hidden;
            box-shadow: 0 2px 3px #172b4310;
            border: 1px solid #edf0f2;
            transition: transform .2s, box-shadow .2s;
        }

        .product-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 20px #172b4310;
        }

        .product-image-wrap {
            position: relative;
            height: 225px;
            background: #edf2ef;
            overflow: hidden;
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .no-image {
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 9px;
            color: #8a9b90;
            font-size: 13px;
        }

        .no-image span {
            font-size: 38px;
        }

        .edit-button {
            position: absolute;
            top: 11px;
            right: 11px;
            width: 39px;
            height: 39px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(255,255,255,.96);
            color: #263c52;
            border-radius: 50%;
            font-size: 19px;
            box-shadow: 0 2px 5px #00000015;
            transition: background .2s;
        }

        .edit-button:hover {
            background: #e4f7e7;
            color: #00a923;
        }

        .product-info {
            padding: 18px 20px 19px;
        }

        .product-name {
            font-size: 16px;
            font-weight: 700;
            line-height: 1.5;
            color: #172b43;
            margin-bottom: 7px;
            overflow-wrap: anywhere;
        }

        .product-price {
            color: #00a923;
            font-size: 17px;
            font-weight: 800;
            margin-bottom: 11px;
        }

        .product-description {
            color: #7a8796;
            font-size: 12px;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .product-meta {
            border-top: 1px solid #f0f2f4;
            padding: 13px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
        }

        .stock-label {
            font-size: 13px;
            color: #405269;
        }

        .stock-value {
            font-weight: 700;
            color: #16823a;
        }

        .stock-value.empty {
            color: #dc2626;
        }

        .card-actions {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .action-link,
        .action-delete {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            padding: 8px 11px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }

        .action-link {
            background: #e7f7e9;
            color: #16823a;
        }

        .action-link:hover {
            background: #d4f0d8;
        }

        .action-delete {
            background: #fff0f0;
            color: #d12e2e;
            border: none;
        }

        .action-delete:hover {
            background: #ffe0e0;
        }

        .delete-form {
            margin: 0;
        }

        /* EMPTY STATE */
        .empty-state {
            grid-column: 1 / -1;
            background: white;
            text-align: center;
            border-radius: 18px;
            padding: 55px 20px;
            color: #758396;
            border: 1px solid #e7ebef;
        }

        .empty-icon {
            font-size: 42px;
            margin-bottom: 15px;
        }

        .empty-state h3 {
            color: #25364b;
            margin-bottom: 8px;
        }

        .empty-state p {
            font-size: 13px;
            margin-bottom: 20px;
        }

        .footer {
            text-align: center;
            color: #8792a2;
            font-size: 11px;
            padding: 30px 10px 15px;
        }

        /* RESPONSIVE */
        @media (max-width: 1000px) {
            .content {
                padding: 22px;
            }

            .product-image-wrap {
                height: 190px;
            }
        }

        @media (max-width: 760px) {
            .layout {
                display: block;
            }

            .layout > .sidebar {
                width: 100%;
                min-width: 0;
                min-height: auto;
            }

            .topbar {
                min-height: auto;
                padding: 18px;
            }

            .topbar h1 {
                font-size: 19px;
            }

            .topbar p {
                font-size: 12px;
            }

            .seller-badge {
                padding: 10px;
                font-size: 10px;
            }

            .content {
                padding: 18px 13px;
            }

            .toolbar {
                flex-direction: column;
                align-items: stretch;
                padding: 14px;
                gap: 12px;
                margin-bottom: 23px;
            }

            .btn-add {
                width: 100%;
            }

            .product-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 400px) {
            .topbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .product-meta {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    {{-- SIDEBAR --}}
    @include('penjual.partials.sidebar')

    {{-- MAIN CONTENT --}}
    <main class="main">

        <header class="topbar">
            <div>
                <h1>Kelola Produk</h1>
                <p>Kelola produk dan persediaan tokomu di Jastip-in</p>
            </div>

            <div class="seller-badge">
                ● &nbsp; AREA PENJUAL
            </div>
        </header>

        <section class="content">

            {{-- NOTIFIKASI --}}
            @if (session('success'))
                <div class="alert-success">
                    ✓ {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert-error">
                    Ada kesalahan saat memproses produk.
                    Silakan periksa kembali data.
                </div>
            @endif

            {{-- PENCARIAN DAN TAMBAH PRODUK --}}
            <div class="toolbar">

                <div class="search-box">
                    <span>⌕</span>

                    <input
                        type="search"
                        id="searchProduct"
                        placeholder="Cari nama produk..."
                        aria-label="Cari nama produk"
                    >
                </div>

                <a href="{{ route('penjual.produk.create') }}" class="btn-add">
                    <span style="font-size:20px;">＋</span>
                    Tambah Item Menu
                </a>

            </div>

            {{-- JUDUL PRODUK --}}
            <div class="section-heading">
                <h2>Daftar Produk Saya</h2>

                <span class="product-count">
                    {{ $produks->count() }} produk
                </span>
            </div>

            {{-- DAFTAR PRODUK --}}
            <div class="product-grid" id="productGrid">

                @forelse ($produks as $produk)

                    @php
                        $gambar = $produk->img;

                        if ($gambar && !preg_match('/^https?:\/\//i', $gambar)) {
                            $gambar = asset(
                                'storage/' .
                                ltrim(preg_replace('#^storage/#', '', $gambar), '/')
                            );
                        }
                    @endphp

                    <article
                        class="product-card"
                        data-name="{{ strtolower($produk->nm_produk) }}"
                    >

                        {{-- GAMBAR PRODUK --}}
                        <div class="product-image-wrap">

                            @if ($gambar)

                                <img
                                    src="{{ $gambar }}"
                                    alt="{{ $produk->nm_produk }}"
                                    class="product-image"
                                    loading="lazy"
                                    onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"
                                >

                                <div class="no-image" style="display:none;">
                                    <span>▧</span>
                                    Foto tidak tersedia
                                </div>

                            @else

                                <div class="no-image">
                                    <span>▧</span>
                                    Belum ada foto produk
                                </div>

                            @endif

                            <a
                                href="{{ route('penjual.produk.edit', $produk->id_produk) }}"
                                class="edit-button"
                                title="Edit produk"
                                aria-label="Edit {{ $produk->nm_produk }}"
                            >✎</a>

                        </div>

                        {{-- INFORMASI PRODUK --}}
                        <div class="product-info">

                            <h3 class="product-name">
                                {{ $produk->nm_produk }}
                            </h3>

                            <p class="product-price">
                                Rp {{ number_format((float) $produk->harga, 0, ',', '.') }}
                            </p>

                            @if ($produk->desc)
                                <p class="product-description">
                                    {{ $produk->desc }}
                                </p>
                            @else
                                <p class="product-description">
                                    Belum ada deskripsi produk.
                                </p>
                            @endif

                        </div>

                        {{-- STOK DAN AKSI --}}
                        <div class="product-meta">

                            <div class="stock-label">
                                Stok:

                                <span class="stock-value {{ $produk->stok <= 0 ? 'empty' : '' }}">
                                    {{ $produk->stok > 0 ? 'Tersedia' : 'Habis' }}
                                    ({{ $produk->stok }})
                                </span>
                            </div>

                            <div class="card-actions">

                                <a
                                    href="{{ route('penjual.produk.edit', $produk->id_produk) }}"
                                    class="action-link"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('penjual.produk.destroy', $produk->id_produk) }}"
                                    method="POST"
                                    class="delete-form"
                                    onsubmit="return confirm('Yakin ingin menghapus produk ini?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="action-delete">
                                        Hapus
                                    </button>
                                </form>

                            </div>

                        </div>

                    </article>

                @empty

                    <div class="empty-state" id="emptyState">
                        <div class="empty-icon">▤</div>

                        <h3>Belum Ada Produk</h3>

                        <p>
                            Mulai tambahkan produk pertamamu ke Jastip-in.
                        </p>

                        <a href="{{ route('penjual.produk.create') }}" class="btn-add">
                            ＋ Tambah Produk
                        </a>
                    </div>

                @endforelse

                {{-- HASIL PENCARIAN KOSONG --}}
                <div class="empty-state" id="searchEmpty" style="display:none;">
                    <div class="empty-icon">⌕</div>

                    <h3>Produk Tidak Ditemukan</h3>

                    <p>
                        Coba gunakan kata kunci pencarian yang berbeda.
                    </p>
                </div>

            </div>

            <footer class="footer">
                © {{ date('Y') }} Jastip-in · Seller Center
            </footer>

        </section>

    </main>

</div>

{{-- JAVASCRIPT PENCARIAN --}}
<script>
    const searchInput = document.getElementById('searchProduct');
    const productCards = document.querySelectorAll('.product-card');
    const searchEmpty = document.getElementById('searchEmpty');

    searchInput.addEventListener('input', function () {

        const keyword = this.value.toLowerCase().trim();
        let visibleCount = 0;

        productCards.forEach(function (card) {

            const name = card.dataset.name || '';
            const matches = name.includes(keyword);

            card.style.display = matches ? '' : 'none';

            if (matches) {
                visibleCount++;
            }

        });

        searchEmpty.style.display =
            productCards.length > 0 && visibleCount === 0
                ? 'block'
                : 'none';

    });
</script>

</body>
</html>
