<aside class="w-56 bg-gray-900 text-gray-200 flex flex-col justify-between py-6 px-4">
    <div>

        <!-- LOGO -->
        <div class="flex items-center gap-2 mb-8">
            <span class="w-2.5 h-2.5 rounded-full bg-green-500"></span>
            <span class="font-semibold text-white">jastip-in</span>
        </div>

        <!-- MENU -->
        <nav class="space-y-6 text-sm">

            <!-- BERANDA -->
            <a href="{{ route('orders.index') }}"
               class="block text-white font-medium">
                Beranda
            </a>

            <!-- TRANSAKSI -->
            <div>
                <p class="text-xs text-gray-500 uppercase mb-2">
                    Transaksi
                </p>

                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('orders.index') }}"
                           class="hover:text-white text-white font-medium">
                            Pesanan
                        </a>
                    </li>

                    <li>
                        <a href="#"
                           class="hover:text-white text-gray-400">
                            Pengiriman
                        </a>
                    </li>

                </ul>
            </div>

            <!-- PRODUK -->
            <div>
                <p class="text-xs text-gray-500 uppercase mb-2">
                    Produk
                </p>

                <ul class="space-y-2">
                    <li>
                        <a href="#"
                           class="hover:text-white text-gray-400">
                            Produk
                        </a>
                    </li>
                </ul>
            </div>

            <!-- ANALISIS -->
            <div>
                <p class="text-xs text-gray-500 uppercase mb-2">
                    Analisis
                </p>

                <ul class="space-y-2">
                    <li>
                        <a href="#"
                           class="hover:text-white text-gray-400">
                            Laporan
                        </a>
                    </li>

                    <li>
                        <a href="#"
                           class="hover:text-white text-gray-400">
                            Pelanggan
                        </a>
                    </li>
                </ul>
            </div>

</aside>