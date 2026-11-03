
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk | Jastip-in</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', Arial, sans-serif;
            background: #f4f5f7;
            color: #172b29;
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
            background: white;
            border-bottom: 1px solid #e5eeeb;
            padding: 22px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .topbar small {
            color: #718582;
            font-size: 12px;
        }

        .topbar h2 {
            margin-top: 5px;
            font-size: 21px;
            color: #172b43;
        }

        .seller {
            background: #e8f7ed;
            color: #087443;
            padding: 10px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .content {
            padding: 32px;
            max-width: 1100px;
            margin: auto;
        }

        /* BREADCRUMB */
        .breadcrumb {
            color: #718582;
            font-size: 12px;
            margin-bottom: 22px;
        }

        .breadcrumb a {
            color: #087443;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        /* HEADING */
        .page-heading {
            margin-bottom: 25px;
        }

        .page-heading h1 {
            margin-bottom: 9px;
            font-size: 27px;
            letter-spacing: -1px;
            color: #172b43;
        }

        .page-heading p {
            color: #718582;
            font-size: 13px;
            line-height: 1.6;
        }

        /* FORM CARD */
        .form-card {
            background: white;
            border: 1px solid #e4eeeb;
            border-radius: 18px;
            padding: 28px;
            box-shadow: 0 8px 30px rgba(17,94,89,.04);
        }

        .section-title {
            font-size: 16px;
            font-weight: 800;
            margin-bottom: 6px;
            color: #172b43;
        }

        .section-description {
            font-size: 12px;
            color: #81928f;
            margin-bottom: 24px;
            line-height: 1.6;
        }

        .required {
            color: #dc2626;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .field {
            min-width: 0;
        }

        .field.full {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 9px;
            color: #344c48;
        }

        input,
        textarea,
        select {
            display: block;
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #dce7e4;
            border-radius: 9px;
            background: #fbfdfc;
            color: #172b29;
            font-family: inherit;
            font-size: 13px;
            outline: none;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #087443;
            box-shadow: 0 0 0 3px rgba(8,116,67,.10);
        }

        textarea {
            resize: vertical;
            min-height: 110px;
        }

        input[type="file"] {
            background: white;
            padding: 10px;
        }

        .hint {
            color: #81928f;
            font-size: 11px;
            margin-top: 8px;
            line-height: 1.6;
        }

        /* ERROR */
        .error-box {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            border-radius: 10px;
            padding: 14px 18px;
            margin-bottom: 22px;
            font-size: 12px;
        }

        .error-text {
            color: #dc2626;
            font-size: 12px;
            margin-top: 6px;
        }

        /* IMAGE PREVIEW */
        .preview {
            display: none;
            margin-top: 12px;
            width: 180px;
            height: 160px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #dce7e4;
        }

        /* BUTTONS */
        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 28px;
            padding-top: 22px;
            border-top: 1px solid #edf2f0;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            border-radius: 9px;
            padding: 12px 18px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }

        .btn-back {
            color: #49615d;
            background: #edf3f1;
        }

        .btn-save {
            color: white;
            background: #087443;
        }

        .btn-save:hover {
            background: #065c35;
        }

        .btn-back:hover {
            background: #dfe9e6;
        }

        .footer {
            text-align: center;
            color: #91a19e;
            font-size: 11px;
            padding: 25px 10px;
        }

        /* RESPONSIVE */
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
                padding: 18px;
            }

            .content {
                padding: 20px 14px;
            }

            .form-card {
                padding: 20px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .field.full {
                grid-column: auto;
            }

            .page-heading h1 {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    {{-- SIDEBAR --}}
    @include('penjual.partials.sidebar')

    <main class="main">

        {{-- TOPBAR --}}
        <header class="topbar">
            <div>
                <small>Seller Center / Produk</small>
                <h2>Tambah Produk</h2>
            </div>

            <div class="seller">
                ● AREA PENJUAL
            </div>
        </header>

        <section class="content">

            {{-- BREADCRUMB --}}
            <div class="breadcrumb">
                <a href="{{ route('penjual.dashboard') }}">Dashboard</a>
                &nbsp; / &nbsp;
                <a href="{{ route('penjual.produk.index') }}">Produk Saya</a>
                &nbsp; / &nbsp; Tambah Produk
            </div>

            {{-- PAGE HEADING --}}
            <div class="page-heading">
                <h1>Tambah Produk Baru</h1>
                <p>
                    Lengkapi informasi produk yang ingin kamu jual di Jastip-in.
                </p>
            </div>

            {{-- ERROR VALIDATION --}}
            @if ($errors->any())
                <div class="error-box">
                    <strong>Produk belum bisa disimpan.</strong>

                    <ul style="padding-left: 18px; margin-top: 8px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- FORM CARD --}}
            <div class="form-card">

                <h3 class="section-title">Informasi Produk</h3>

                <p class="section-description">
                    Isi data produk dengan benar. Kolom bertanda
                    <span class="required">*</span> wajib diisi.
                </p>

                <form
                    action="{{ route('penjual.produk.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf

                    <div class="form-grid">

                        {{-- NAMA PRODUK --}}
                        <div class="field full">

                            <label for="nm_produk">
                                Nama Produk <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                id="nm_produk"
                                name="nm_produk"
                                value="{{ old('nm_produk') }}"
                                placeholder="Contoh: Nasi Goreng Spesial"
                                maxlength="255"
                                required
                            >

                            @error('nm_produk')
                                <div class="error-text">{{ $message }}</div>
                            @enderror

                        </div>

                        {{-- HARGA --}}
                        <div class="field">

                            <label for="harga">
                                Harga (Rp) <span class="required">*</span>
                            </label>

                            <input
                                type="number"
                                id="harga"
                                name="harga"
                                value="{{ old('harga') }}"
                                placeholder="Contoh: 10000"
                                min="0"
                                step="any"
                                required
                            >

                            <div class="hint">
                                Masukkan angka tanpa titik atau Rp.
                            </div>

                            @error('harga')
                                <div class="error-text">{{ $message }}</div>
                            @enderror

                        </div>

                        {{-- KATEGORI --}}
                        <div class="field">

                            <label for="kategori">
                                Kategori <span class="required">*</span>
                            </label>

                            <select id="kategori" name="kategori" required>

                                <option value="">-- Pilih Kategori --</option>

                                <option value="makanan" {{ old('kategori') == 'makanan' ? 'selected' : '' }}>
                                    Makanan
                                </option>

                                <option value="minuman" {{ old('kategori') == 'minuman' ? 'selected' : '' }}>
                                    Minuman
                                </option>

                                <option value="snack" {{ old('kategori') == 'snack' ? 'selected' : '' }}>
                                    Snack
                                </option>

                                <option value="lainnya" {{ old('kategori') == 'lainnya' ? 'selected' : '' }}>
                                    Lainnya
                                </option>

                            </select>

                            @error('kategori')
                                <div class="error-text">{{ $message }}</div>
                            @enderror

                        </div>

                        {{-- STOK --}}
                        <div class="field">

                            <label for="stok">
                                Stok Produk <span class="required">*</span>
                            </label>

                            <input
                                type="number"
                                id="stok"
                                name="stok"
                                value="{{ old('stok', 0) }}"
                                placeholder="Contoh: 20"
                                min="0"
                                step="1"
                                required
                            >

                            @error('stok')
                                <div class="error-text">{{ $message }}</div>
                            @enderror

                        </div>

                        {{-- DESKRIPSI --}}
                        <div class="field full">

                            <label for="desc">
                                Deskripsi Produk
                            </label>

                            <textarea
                                id="desc"
                                name="desc"
                                placeholder="Jelaskan produk, bahan, rasa, atau informasi lainnya..."
                            >{{ old('desc') }}</textarea>

                            @error('desc')
                                <div class="error-text">{{ $message }}</div>
                            @enderror

                        </div>

                        {{-- FOTO PRODUK --}}
                        <div class="field full">

                            <label for="img">
                                Foto Produk
                            </label>

                            <input
                                type="file"
                                id="img"
                                name="img"
                                accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                            >

                            <div class="hint">
                                Format yang didukung: JPG, JPEG, PNG, WEBP.
                                Maksimal 2 MB.
                            </div>

                            <img
                                id="preview"
                                class="preview"
                                alt="Pratinjau foto produk"
                            >

                            @error('img')
                                <div class="error-text">{{ $message }}</div>
                            @enderror

                        </div>

                    </div>

                    {{-- ACTION BUTTONS --}}
                    <div class="actions">

                        <a
                            href="{{ route('penjual.produk.index') }}"
                            class="btn btn-back"
                        >
                            Batal
                        </a>

                        <button type="submit" class="btn btn-save">
                            Simpan Produk
                        </button>

                    </div>

                </form>

            </div>

            <div class="footer">
                © {{ date('Y') }} Jastip-in · Seller Center
            </div>

        </section>

    </main>

</div>

{{-- PREVIEW FOTO --}}
<script>
    const inputFoto = document.getElementById('img');
    const preview = document.getElementById('preview');

    inputFoto.addEventListener('change', function () {

        const file = this.files[0];

        if (file) {

            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';

        } else {

            preview.removeAttribute('src');
            preview.style.display = 'none';

        }

    });
</script>

</body>
</html>
