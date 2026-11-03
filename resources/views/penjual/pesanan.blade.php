
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pesanan | Jastip-in</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Inter', Arial, sans-serif;
            color: #172b43;
            background: #f3f4f6;
        }

        a { text-decoration: none; }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
         .sidebar {
    width: 276px;
    flex-shrink: 0;
    background: #087443;
    border-right: none;
    padding: 27px 20px;
    color: #ffffff;
}

       .brand {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 0 12px 24px;
    margin: 0 0 28px;
    border-bottom: 1px solid #ffffff30;
}

.brand-name {
    color: #ffffff;
    font-size: 24px;
    font-weight: 800;
}

.brand-caption {
    color: #e0f2e9;
    font-size: 13px;
    margin-top: 5px;
} 

        .brand-subtitle {
            font-size: 14px;
            color: #8792a2;
            margin-top: 5px;
        }

        .nav-link {
    display: flex;
    align-items: center;
    gap: 12px;
    width: 100%;
    padding: 14px 16px;
    margin: 6px 0;
    border-radius: 11px;
    color: #ffffff;
    font-size: 15px;
    font-weight: 500;
    text-decoration: none;
    transition: background 0.2s ease, color 0.2s ease;
}
        .nav-icon {
            width: 27px;
            text-align: center;
            font-size: 21px;
        }

        .nav-link:hover {
    background: #116f49;
    color: #ffffff;
        }

        .nav-link.active {
    background: #ffffff;
    color: #087443;
    font-weight: 700;
        }

        /* MAIN */
        .main {
            flex: 1;
            min-width: 0;
        }

        .topbar {
            min-height: 105px;
            background: #fff;
            border-bottom: 1px solid #e0e5e9;
            padding: 22px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .topbar h1 {
            margin: 0 0 7px;
            font-size: 24px;
        }

        .topbar p {
            margin: 0;
            color: #718096;
            font-size: 14px;
        }

        .store-status {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            border: 1px solid #e0e5e9;
            border-radius: 30px;
            background: white;
            color: #00a923;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-dot {
            width: 11px;
            height: 11px;
            background: #00ad24;
            border-radius: 50%;
        }

        .content {
            max-width: 1500px;
            padding: 30px;
            margin: auto;
        }

        /* SEARCH AND TABS */
        .toolbar {
            background: white;
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 2px 3px #172b4310;
        }

        .search-box {
            position: relative;
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            color: #8b99aa;
        }

        .search-box input {
            width: 100%;
            padding: 14px 15px 14px 45px;
            border: 1px solid #dfe5eb;
            background: #f9fafb;
            border-radius: 14px;
            font-family: inherit;
            font-size: 14px;
            outline: none;
        }

        .search-box input:focus {
            border-color: #00ad24;
            background: white;
        }

        .tabs {
            display: flex;
            align-items: stretch;
            gap: 8px;
            overflow-x: auto;
            margin-top: 19px;
            border-bottom: 1px solid #edf0f2;
        }

        .tab {
            flex-shrink: 0;
            padding: 15px 19px;
            border: none;
            border-bottom: 2px solid transparent;
            background: transparent;
            color: #617085;
            font-family: inherit;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
        }

        .tab.active {
            color: #00a923;
            border-bottom-color: #00ad24;
        }

        .count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 25px;
            height: 25px;
            padding: 0 7px;
            margin-left: 7px;
            border-radius: 20px;
            background: #f0f2f5;
            color: #526174;
            font-size: 11px;
        }

        /* ORDER CARDS */
        .order-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 21px;
        }

        .order-card {
            background: #fff;
            border: 1px solid #edf0f2;
            border-radius: 21px;
            padding: 23px 20px 20px;
            box-shadow: 0 2px 3px #172b4310;
            min-width: 0;
        }

        .order-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 8px;
        }

        .order-id {
            color: #00a923;
            font-size: 14px;
            font-weight: 800;
            margin-bottom: 9px;
        }

        .customer-name {
            font-size: 16px;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .order-time {
            color: #8792a2;
            font-size: 12px;
            text-align: right;
            margin-top: 8px;
            white-space: nowrap;
        }

        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .badge-baru {
            background: #fff0f0;
            color: #e11d2e;
        }

        .badge-diproses {
            background: #fff8df;
            color: #b45309;
        }

        .badge-siap {
            background: #eaf2ff;
            color: #245be9;
        }

        .badge-selesai {
            background: #e7fbf1;
            color: #087d50;
        }

        .badge-ditolak {
            background: #f0f1f3;
            color: #596273;
        }

        .order-detail {
            color: #68778b;
            font-size: 13px;
            line-height: 1.9;
            overflow-wrap: anywhere;
        }

        .order-detail strong {
            color: #64748b;
        }

        .items {
            margin-top: 17px;
            margin-bottom: 14px;
        }

        .item-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 12px;
            padding: 8px 0;
            border-bottom: 1px dashed #e9edf0;
            font-size: 13px;
        }

        .item-name {
            color: #263b52;
            font-weight: 500;
            overflow-wrap: anywhere;
        }

        .item-price {
            color: #64748b;
            white-space: nowrap;
        }

        .note {
            background: #fffae9;
            border-left: 2px solid #ffb000;
            color: #a34a00;
            border-radius: 5px;
            padding: 12px;
            font-size: 12px;
            line-height: 1.6;
            margin: 13px 0 15px;
            overflow-wrap: anywhere;
        }

        .payment {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            border-top: 1px solid #edf0f2;
            padding-top: 14px;
            margin-top: 15px;
        }

        .payment-label {
            color: #8792a2;
            font-size: 13px;
        }

        .payment-total {
            color: #111827;
            font-size: 17px;
            font-weight: 800;
            white-space: nowrap;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            flex: 1;
            border: none;
            border-radius: 14px;
            padding: 12px 10px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 700;
            text-align: center;
            cursor: pointer;
        }

        .btn-reject {
            color: #ef233c;
            background: #fff0f0;
        }

        .btn-accept {
            color: white;
            background: #00ad24;
        }

        .btn-ready {
            color: white;
            background: #2864ed;
        }

        .btn-done {
            color: white;
            background: #087d50;
        }

        .btn:hover {
            filter: brightness(.96);
        }

        .empty-state {
            grid-column: 1 / -1;
            background: white;
            border-radius: 18px;
            padding: 50px 20px;
            text-align: center;
            color: #758396;
        }

        .empty-state h3 {
            color: #25364b;
            margin-bottom: 8px;
        }

        .empty-state p {
            font-size: 13px;
        }

        .footer {
            text-align: center;
            color: #8792a2;
            font-size: 11px;
            padding: 28px 10px 15px;
        }

        @media (max-width: 1050px) {
            .sidebar { width: 245px; }
            .content { padding: 20px; }
            .order-grid { gap: 15px; }
            .order-card { padding: 18px 15px; }
        }

        @media (max-width: 760px) {
            .layout { display: block; }

            .sidebar {
                width: 100%;
                padding: 12px;
                border-right: none;
                border-bottom: 1px solid #e0e5e9;
            }

            .brand {
                padding: 0 5px 15px;
                margin-bottom: 12px;
            }

            .brand-icon {
                width: 42px;
                height: 42px;
            }

            .brand-name { font-size: 21px; }

            .nav-link {
                display: inline-flex;
                padding: 10px;
                margin: 2px;
                font-size: 12px;
            }

            .nav-icon {
                width: auto;
                font-size: 16px;
            }

            .topbar {
                padding: 18px;
                min-height: auto;
            }

            .topbar h1 { font-size: 19px; }
            .topbar p { font-size: 12px; }

            .store-status {
                font-size: 10px;
                padding: 9px;
            }

            .content { padding: 16px 12px; }

            .toolbar {
                padding: 13px;
                margin-bottom: 20px;
            }

            .tabs { gap: 0; }

            .tab {
                padding: 13px 12px;
                font-size: 12px;
            }

            .order-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
<div class="layout">

    
@include('penjual.partials.sidebar')


    <main class="main">
        <header class="topbar">
            <div>
                <h1>Dapur Jastip-in</h1>
                <p>Kelola pesanan dan operasional tokomu</p>
            </div>

            <div class="store-status">
                <span class="status-dot"></span>
                AREA PENJUAL
            </div>
        </header>

        <section class="content">
            <div class="toolbar">
                <div class="search-box">
                    <span class="search-icon">⌕</span>
                    <input
                        type="search"
                        id="searchOrder"
                        placeholder="Cari berdasarkan ID Pesanan, Pelanggan, atau Driver..."
                    >
                </div>

                <div class="tabs">
                    <button class="tab active" data-filter="semua">
                        Semua <span class="count" id="count-semua">4</span>
                    </button>
                    <button class="tab" data-filter="baru">
                        Baru <span class="count" id="count-baru">1</span>
                    </button>
                    <button class="tab" data-filter="diproses">
                        Diproses <span class="count" id="count-diproses">1</span>
                    </button>
                    <button class="tab" data-filter="siap">
                        Siap Diambil <span class="count" id="count-siap">1</span>
                    </button>
                    <button class="tab" data-filter="selesai">
                        Selesai <span class="count" id="count-selesai">1</span>
                    </button>
                    <button class="tab" data-filter="ditolak">
                        Ditolak <span class="count" id="count-ditolak">0</span>
                    </button>
                </div>
            </div>

            <div class="order-grid" id="orderGrid">

                <!-- CONTOH PESANAN 1 -->
                <article class="order-card" data-status="baru"
                    data-search="GF-8921 budi santoso agus setiawan gojek gopay ayam goreng lengkuas es teh manis">
                    <div class="order-top">
                        <div>
                            <div class="order-id">GF-8921</div>
                            <div class="customer-name">Budi Santoso</div>
                        </div>
                        <div>
                            <span class="badge badge-baru">Pesanan Baru</span>
                            <div class="order-time">10:15 WIB</div>
                        </div>
                    </div>

                    <div class="order-detail">
                        <div>🛵 <strong>Driver:</strong> Agus Setiawan (Gojek)</div>
                        <div>▤ <strong>Metode:</strong> GoPay</div>
                    </div>

                    <div class="items">
                        <div class="item-row">
                            <span class="item-name">2x Ayam Goreng Lengkuas</span>
                            <span class="item-price">Rp 56.000</span>
                        </div>
                        <div class="item-row">
                            <span class="item-name">2x Es Teh Manis Jumbo</span>
                            <span class="item-price">Rp 12.000</span>
                        </div>
                    </div>

                    <div class="note"><strong>Catatan:</strong> Sambal dipisah ya</div>

                    <div class="payment">
                        <span class="payment-label">Total Pembayaran</span>
                        <span class="payment-total">Rp 68.000</span>
                    </div>

                    <div class="actions">
                        <button class="btn btn-reject" data-action="ditolak">Tolak</button>
                        <button class="btn btn-accept" data-action="diproses">Terima Pesanan</button>
                    </div>
                </article>

                <!-- CONTOH PESANAN 2 -->
                <article class="order-card" data-status="diproses"
                    data-search="GF-8920 siti rahma bambang kurnia gojek tunai ayam bakar kecap tahu tempe goreng">
                    <div class="order-top">
                        <div>
                            <div class="order-id">GF-8920</div>
                            <div class="customer-name">Siti Rahma</div>
                        </div>
                        <div>
                            <span class="badge badge-diproses">Diproses</span>
                            <div class="order-time">10:02 WIB</div>
                        </div>
                    </div>

                    <div class="order-detail">
                        <div>🛵 <strong>Driver:</strong> Bambang Kurnia (Gojek)</div>
                        <div>▤ <strong>Metode:</strong> Tunai</div>
                    </div>

                    <div class="items">
                        <div class="item-row">
                            <span class="item-name">1x Ayam Bakar Kecap</span>
                            <span class="item-price">Rp 30.000</span>
                        </div>
                        <div class="item-row">
                            <span class="item-name">1x Tahu & Tempe Goreng</span>
                            <span class="item-price">Rp 10.000</span>
                        </div>
                    </div>

                    <div class="note"><strong>Catatan:</strong> Banyakin kuah kecapnya</div>

                    <div class="payment">
                        <span class="payment-label">Total Pembayaran</span>
                        <span class="payment-total">Rp 40.000</span>
                    </div>

                    <div class="actions">
                        <button class="btn btn-ready" data-action="siap">Tandai Siap Diambil</button>
                    </div>
                </article>

                <!-- CONTOH PESANAN 3 -->
                <article class="order-card" data-status="siap"
                    data-search="GF-8919 rian hidayat dedi supriyadi gojek transfer nasi goreng">
                    <div class="order-top">
                        <div>
                            <div class="order-id">GF-8919</div>
                            <div class="customer-name">Rian Hidayat</div>
                        </div>
                        <div>
                            <span class="badge badge-siap">Siap Diambil</span>
                            <div class="order-time">09:50 WIB</div>
                        </div>
                    </div>

                    <div class="order-detail">
                        <div>🛵 <strong>Driver:</strong> Dedi Supriyadi (Gojek)</div>
                        <div>▤ <strong>Metode:</strong> Transfer</div>
                    </div>

                    <div class="items">
                        <div class="item-row">
                            <span class="item-name">2x Nasi Goreng Spesial</span>
                            <span class="item-price">Rp 36.000</span>
                        </div>
                    </div>

                    <div class="note"><strong>Catatan:</strong> Tidak pedas</div>

                    <div class="payment">
                        <span class="payment-label">Total Pembayaran</span>
                        <span class="payment-total">Rp 36.000</span>
                    </div>

                    <div class="actions">
                        <button class="btn btn-done" data-action="selesai">Tandai Selesai</button>
                    </div>
                </article>

                <!-- CONTOH PESANAN 4 -->
                <article class="order-card" data-status="selesai"
                    data-search="GF-8918 andi wijaya eko prasetyo gojek tunai rice bowl">
                    <div class="order-top">
                        <div>
                            <div class="order-id">GF-8918</div>
                            <div class="customer-name">Andi Wijaya</div>
                        </div>
                        <div>
                            <span class="badge badge-selesai">Selesai</span>
                            <div class="order-time">09:40 WIB</div>
                        </div>
                    </div>

                    <div class="order-detail">
                        <div>🛵 <strong>Driver:</strong> Eko Prasetyo (Gojek)</div>
                        <div>▤ <strong>Metode:</strong> Tunai</div>
                    </div>

                    <div class="items">
                        <div class="item-row">
                            <span class="item-name">1x Rice Bowl Ayam</span>
                            <span class="item-price">Rp 25.000</span>
                        </div>
                    </div>

                    <div class="note"><strong>Catatan:</strong> Terima kasih</div>

                    <div class="payment">
                        <span class="payment-label">Total Pembayaran</span>
                        <span class="payment-total">Rp 25.000</span>
                    </div>

                    <div class="actions">
                        <button class="btn btn-done" disabled style="opacity:.65;cursor:default;">
                            Pesanan Selesai
                        </button>
                    </div>
                </article>

                <div class="empty-state" id="emptyState" style="display:none;">
                    <h3>Pesanan Tidak Ditemukan</h3>
                    <p>Coba ganti kata kunci atau pilih status yang lain.</p>
                </div>

            </div>

            <footer class="footer">
                © {{ date('Y') }} Jastip-in · Seller Center
            </footer>
        </section>
    </main>
</div>

<script>
    const cards = Array.from(document.querySelectorAll('.order-card'));
    const tabs = document.querySelectorAll('.tab');
    const search = document.getElementById('searchOrder');
    const emptyState = document.getElementById('emptyState');

    let activeFilter = 'semua';

    function updateOrders() {
        const keyword = search.value.toLowerCase().trim();
        let visible = 0;

        cards.forEach(card => {
            const status = card.dataset.status;
            const text = card.dataset.search.toLowerCase();
            const matchesStatus = activeFilter === 'semua' || status === activeFilter;
            const matchesSearch = text.includes(keyword);
            const show = matchesStatus && matchesSearch;

            card.style.display = show ? '' : 'none';

            if (show) visible++;
        });

        emptyState.style.display = visible === 0 ? 'block' : 'none';
    }

    function updateCounts() {
        const statuses = ['semua', 'baru', 'diproses', 'siap', 'selesai', 'ditolak'];

        statuses.forEach(status => {
            const count = status === 'semua'
                ? cards.length
                : cards.filter(card => card.dataset.status === status).length;

            document.getElementById('count-' + status).textContent = count;
        });
    }

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            activeFilter = tab.dataset.filter;

            tabs.forEach(item => item.classList.remove('active'));
            tab.classList.add('active');

            updateOrders();
        });
    });

    search.addEventListener('input', updateOrders);

    document.querySelectorAll('[data-action]').forEach(button => {
        button.addEventListener('click', () => {
            const card = button.closest('.order-card');
            const nextStatus = button.dataset.action;

            const labels = {
                diproses: 'menerima pesanan ini',
                siap: 'menandai pesanan siap diambil',
                selesai: 'menyelesaikan pesanan ini',
                ditolak: 'menolak pesanan ini'
            };

            if (!confirm('Yakin ingin ' + labels[nextStatus] + '?')) {
                return;
            }

            const badge = card.querySelector('.badge');
            const statusLabels = {
                diproses: ['Diproses', 'badge-diproses'],
                siap: ['Siap Diambil', 'badge-siap'],
                selesai: ['Selesai', 'badge-selesai'],
                ditolak: ['Ditolak', 'badge-ditolak']
            };

            const [label, className] = statusLabels[nextStatus];

            card.dataset.status = nextStatus;
            badge.textContent = label;
            badge.className = 'badge ' + className;

            if (nextStatus === 'ditolak') {
                card.querySelector('.actions').innerHTML =
                    '<button class="btn btn-reject" disabled>Pesanan Ditolak</button>';
            } else if (nextStatus === 'diproses') {
                card.querySelector('.actions').innerHTML =
                    '<button class="btn btn-ready" data-action="siap">Tandai Siap Diambil</button>';
            } else if (nextStatus === 'siap') {
                card.querySelector('.actions').innerHTML =
                    '<button class="btn btn-done" data-action="selesai">Tandai Selesai</button>';
            } else {
                card.querySelector('.actions').innerHTML =
                    '<button class="btn btn-done" disabled>Pesanan Selesai</button>';
            }

            attachAction(card);
            updateCounts();
            updateOrders();
        });
    });

    function attachAction(card) {
        card.querySelectorAll('[data-action]').forEach(button => {
            button.addEventListener('click', () => {
                const action = button.dataset.action;

                const messages = {
                    siap: 'menandai pesanan siap diambil',
                    selesai: 'menyelesaikan pesanan ini'
                };

                if (!confirm('Yakin ingin ' + messages[action] + '?')) return;

                const badge = card.querySelector('.badge');
                const states = {
                    siap: ['siap', 'Siap Diambil', 'badge-siap'],
                    selesai: ['selesai', 'Selesai', 'badge-selesai']
                };

                const [status, label, cls] = states[action];

                card.dataset.status = status;
                badge.textContent = label;
                badge.className = 'badge ' + cls;

                if (status === 'siap') {
                    card.querySelector('.actions').innerHTML =
                        '<button class="btn btn-done" data-action="selesai">Tandai Selesai</button>';
                    attachAction(card);
                } else {
                    card.querySelector('.actions').innerHTML =
                        '<button class="btn btn-done" disabled>Pesanan Selesai</button>';
                }

                updateCounts();
                updateOrders();
            });
        });
    }

    updateCounts();
    updateOrders();
</script>
</body>
</html>
