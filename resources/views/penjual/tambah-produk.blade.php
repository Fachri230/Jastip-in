```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        button, .kembali {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        button {
            background: #198754;
            color: white;
        }

        .kembali {
            background: #6c757d;
            color: white;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Produk</h2>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('penjual.produk.store') }}" method="POST">
            @csrf

            <label for="nm_produk">Nama Produk</label>
            <input
                type="text"
                id="nm_produk"
                name="nm_produk"
                value="{{ old('nm_produk') }}"
                required
            >

            <label for="harga">Harga (Rp)</label>
            <input
                type="number"
                id="harga"
                name="harga"
                value="{{ old('harga') }}"
                min="0"
                step="0.01"
                required
            >

            <label for="desc">Deskripsi</label>
            <textarea
                id="desc"
                name="desc"
                rows="3"
            >{{ old('desc') }}</textarea>

            <label for="kategori">Kategori</label>
            <input
                type="text"
                id="kategori"
                name="kategori"
                value="{{ old('kategori') }}"
                required
            >

            <label for="stok">Stok</label>
            <input
                type="number"
                id="stok"
                name="stok"
                value="{{ old('stok', 0) }}"
                min="0"
                required
            >

            <label for="img">URL Gambar (opsional)</label>
            <input
                type="text"
                id="img"
                name="img"
                value="{{ old('img') }}"
            >

            <button type="submit">Simpan Produk</button>

            <a href="{{ route('penjual.produk.index') }}" class="kembali">
                Kembali
            </a>
        </form>
    </div>
</body>
</html>
```
