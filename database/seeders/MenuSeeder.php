<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produk')->insert([
            [
                'img' => 'images/yoga.png',
                'nm_produk' => 'Nasi Goreng',
                'harga' => 12000,
                'desc' => 'Nasi goreng dengan telur dan ayam.',
                'stok' => '10',
                'kategori' => 'Makanan',

            ],

            [
                'img' => 'images/yoga.png',
                'nm_produk' => 'Es THE Jumbo',
                'harga' => 5000,
                'desc' => 'Yang Jumbo PAssti WENAK.',
                'stok' => '0',
                'kategori' => 'Minuman',

            ],

            
        ]);
    }
}
