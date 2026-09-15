@extends('layouts.app')

@section('content')

<div
    x-data="orderPage()"
    class="flex w-full h-screen overflow-hidden bg-[#f4f2f2]"
>

    <!-- AREA UTAMA -->
    <main
        class="flex-1 min-w-0 flex flex-col overflow-hidden"
    >

        <!-- HEADER -->
        <div class="h-[65px] bg-white border-b border-gray-300 flex items-center justify-between px-5">

            <h1 class="text-[20px] font-medium text-gray-800">
                Pesanan
            </h1>

            <div class="flex items-center gap-4">
               
            </div>

        </div>


        <!-- TAB STATUS -->
        <div class="px-5 pt-3 bg-[#f4f2f2]">

            <div class="flex border-b border-gray-500">

                <template x-for="tab in tabs" :key="tab.value">

                    <button
                        @click="changeStatus(tab.value)"
                        class="px-4 py-2 text-[13px] border-b-2 transition"
                        :class="activeStatus === tab.value
                            ? 'border-black text-black font-medium'
                            : 'border-transparent text-gray-700 hover:text-black'"
                    >
                        <span x-text="tab.label"></span>
                    </button>

                </template>

            </div>

        </div>


        <!-- SEARCH + FILTER -->
        <div class="px-5 py-3 bg-[#f4f2f2]">

            <div class="flex gap-4">

                <div class="relative w-[330px]">

                    <input
                        type="text"
                        x-model="search"
                        placeholder="Cari nama, Nomor pesanan, atau Produk"
                        class="w-full h-[35px] bg-[#dedede] border-none outline-none px-3 text-[12px] text-gray-700"
                    >

                </div>
                
            </div>
        </div>


        <!-- TABEL PESANAN -->
        <div class="flex-1 px-5 pb-5 overflow-auto">

            <div class="bg-white min-h-[450px]">

                <!-- HEADER TABEL -->
                <div
                    class="grid grid-cols-[45px_1.3fr_1.4fr_1fr_1fr_1fr] bg-[#d8d8d8] h-[40px] items-center text-[11px] text-gray-800"
                >
                    <div class="px-3">no</div>
                    <div>Pesanan</div>
                    <div>Pelanggan</div>
                    <div>Total</div>
                    <div>status</div>
                </div>


                <!-- BARIS PESANAN -->
                <template x-for="order in filteredOrders" :key="order.id">

                    <div
                        @click="selectOrder(order)"
                        class="grid grid-cols-[45px_1.3fr_1.4fr_1fr_1fr_1fr] min-h-[58px] items-center text-[12px] border-b border-gray-100 cursor-pointer hover:bg-gray-50"
                        :class="selectedOrder && selectedOrder.id === order.id ? 'bg-gray-50' : ''"
                    >

                        <div class="px-3" x-text="order.no"></div>

                        <div
                            class="capitalize"
                            x-text="order.nama_pesanan"
                        ></div>

                        <div
                            class="capitalize"
                            x-text="order.pelanggan"
                        ></div>
                          
                        <div x-text="formatRupiah(order.total)"></div>

                        <div
                            class="capitalize"
                            x-text="formatStatus(order.status)"
                       ></div>

                        
                    </div>

                </template>


                <!-- JIKA TIDAK ADA DATA -->
                <div
                    x-show="filteredOrders.length === 0"
                    class="py-10 text-center text-gray-500 text-sm"
                >
                    Pesanan tidak ditemukan.
                </div>

            </div>

        </div>

    </main>


    <!-- PANEL RINCIAN PESANAN -->
    <aside
        x-show="selectedOrder"
        x-transition
        class="w-[300px] bg-white border-l border-gray-300 h-screen overflow-y-auto flex-shrink-0"
    >

        <!-- HEADER DETAIL -->
        <div class="px-4 py-3 border-b border-gray-300 flex justify-between">

            <div>
                <h2 class="text-[18px] font-medium">
                    Rincian Pesanan
                </h2>

                <div class="flex items-center gap-2 mt-1">

                    <span
                        class="w-3 h-3 rounded-full bg-yellow-400"
                    ></span>

<select
    x-model="selectedOrder.status"
    @change="updateStatus(selectedOrder)"
    class="text-[12px] border border-gray-300 rounded px-2 py-1"
>
   <option value="diproses">Diproses</option>
   <option value="siap_diambil">Siap Diambil</option>
   <option value="selesai">Selesai</option>
</select>

                </div>

                <div
                    class="text-[17px] mt-1"
                    x-text="selectedOrder.invoice"
                ></div>

                <div class="text-[11px] text-gray-600 mt-1">
                    waktu pesanan:
                    <span>10 Agustus 2026</span>
                </div>
            </div>

            <button
                @click="selectedOrder = null"
                class="text-[25px] leading-none text-gray-700 hover:text-black"
            >
                
            </button>

        </div>


        <!-- PELANGGAN -->
        <div class="px-4 py-3 border-b border-gray-300">

            <h3 class="text-[17px] font-medium uppercase">
                PELANGGAN
            </h3>

            <div class="mt-3 text-[12px]">
                <div
                    class="capitalize"
                    x-text="selectedOrder.pelanggan"
                ></div>

                <div x-text="selectedOrder.no_hp"></div>
            </div>

        </div>


        <!-- INFORMASI PENGAMBILAN -->
        <div class="px-4 py-3 border-b border-gray-300">

            <h3 class="text-[17px] font-medium">
                informasi pengambilan
            </h3>

            <div class="mt-3 text-[12px]">

                <div
                    class="capitalize"
                    x-text="'kelas ' + selectedOrder.kelas"
                ></div>

                <div
                    class="mt-3"
                    x-text="selectedOrder.lokasi_ambil"
                ></div>

            </div>

        </div>


        <!-- DETAIL PESANAN -->
        <div class="px-4 py-3">

            <h3 class="text-[17px] font-medium">
                DETAIL PESANAN
            </h3>

            <div class="mt-4 space-y-3">

                <template
                    x-for="item in selectedOrder.items"
                    :key="item.nama"
                >

                    <div class="grid grid-cols-[1fr_35px_75px] text-[12px]">

                        <div x-text="item.nama"></div>

                        <div
                            class="text-center"
                            x-text="item.qty"
                        ></div>

                        <div
                            x-text="formatRupiah(item.subtotal)"
                        ></div>

                    </div>

                </template>

            </div>

        </div>


        <!-- TOTAL -->
        <div class="mx-4 border-t border-b border-gray-400 py-3 mt-2">

            <div class="flex justify-between text-[12px]">

                <span>Total</span>

                <span
                    class="text-green-600 font-medium"
                    x-text="formatRupiah(selectedOrder.total)"
                ></span>

            </div>

        </div>


        <!-- BUTTON -->
        <div class="px-9 mt-[125px] pb-8 space-y-4">

            <button
                @click="finishOrder()"
                class="w-full h-[35px] bg-green-600 hover:bg-green-700 text-white text-[12px]"
            >
                pesanan selesai
            </button>

        </div>

    </aside>

</div>


<script>

function orderPage() {

    return {

        orders: @json($orders),

        activeStatus: @json($activeStatus),

        search: '',

        selectedOrder: null,


        tabs: [

            {
                value: 'semua',
                label: 'Semua'
            },


            {
                value: 'diproses',
                label: 'Diproses'
            },

            {
                value: 'siap_diambil',
                label: 'Siap Diambil'
            },

            {
                value: 'selesai',
                label: 'Selesai'
            },


        ],


        get filteredOrders() {

            let result = this.orders;


            // FILTER STATUS

            if (this.activeStatus !== 'semua') {

                result = result.filter(
                    order => order.status === this.activeStatus
                );

            }


            // SEARCH

            if (this.search.trim() !== '') {

                const keyword = this.search.toLowerCase();

                result = result.filter(order =>

                    order.nama_pesanan.toLowerCase().includes(keyword) ||

                    order.pelanggan.toLowerCase().includes(keyword) ||

                    order.invoice.toLowerCase().includes(keyword)

                );

            }


            return result;

        },


        changeStatus(status) {

            this.activeStatus = status;

            const url = new URL(window.location.href);

            if (status === 'semua') {

                url.searchParams.delete('status');

            } else {

                url.searchParams.set('status', status);

            }

            window.history.pushState({}, '', url);

        },


        selectOrder(order) {

            this.selectedOrder = order;

        },


        formatRupiah(number) {

            return 'Rp.' + Number(number)
                .toLocaleString('id-ID');

},

        formatStatus(status) {

    const names = {
        'diproses': 'Diproses',
        'siap_diambil': 'Siap Diambil',
        'selesai': 'Selesai',
    };

    return names[status] || status;
},

updateStatus(order) {

    const index = this.orders.findIndex(
        item => item.id === order.id
    );

    if (index !== -1) {
        this.orders[index].status = order.status;
    }

    alert(
        'Status pesanan berhasil diubah menjadi ' +
        this.formatStatus(order.status)
    );
},



       finishOrder() {
    if (!this.selectedOrder) return;

    const index = this.orders.findIndex(
        order => order.id === this.selectedOrder.id
    );

    if (index !== -1) {
        this.orders.splice(index, 1);
    }

    this.selectedOrder = null;

    alert('Pesanan berhasil diselesaikan.');

        },
        
    }

}

</script>

@endsection