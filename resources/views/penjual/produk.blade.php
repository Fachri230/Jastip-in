```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk Penjual</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        .tambah {
            display: inline-block;
            background: #198754;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            margin-bottom: 20px;
        }

        .sukses {
            background: #d1e7dd;
            color: #0f5132;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .error {
            color: #842029;
            background: #f8d7da;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #198754;
            color: white;
        }

        button {
            cursor: pointer;
            border: none;
            background: none;
            color: #dc3545;
        }

        .edit {
            color: #0d6efd;
        }

        .kosong {
            text-align: center;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Daftar Produk Saya</h2>

        @if (session('success'))
            <div class="sukses">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="error">
                Ada data yang belum valid.
            </div>
        @endif

        <a href="{{ route('penjual.produk.create') }}" class="tambah">
            + Tambah Produk
        </a>

        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($produks as $produk)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>
                            @if ($produk->img)
                                <img
                                    src="{{ $produk->img }}"
                                    alt="{{ $produk->nm_produk }}"
                                    width="60"
                                >
                            @else
                                -
                            @endif
                        </td>

                        <td>{{ $produk->nm_produk }}</td>

                        <td>
                            Rp {{ number_format($produk->harga, 0, ',', '.') }}
                        </td>

                        <td>{{ $produk->desc ?: '-' }}</td>

                        <td>{{ $produk->kategori }}</td>

                        <td>{{ $produk->stok }}</td>

                        <td>
                            <a
                                href="{{ route('penjual.produk.edit', $produk->id_produk) }}"
                                class="edit"
                            >
                                Edit
                            </a>

                            <form
                                action="{{ route('penjual.produk.destroy', $produk->id_produk) }}"
                                method="POST"
                                style="display:inline"
                                onsubmit="return confirm('Yakin ingin menghapus produk ini?')"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="kosong">
                            Belum ada produk. Silakan tambah produk terlebih dahulu.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
```
