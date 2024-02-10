<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'nama_product' => 'Shocks',
            'deskripsi_product' => 'Sepatu olahraga yang nyaman dan ringan, cocok untuk berbagai aktivitas fisik. Sepatu ini memiliki sol yang fleksibel dan tahan lama, serta bantalan udara yang menyerap goncangan. Sepatu ini juga memiliki desain yang sporty dan modern, dengan warna-warna cerah yang menarik.',
            'url_gambar' => 'https://pm1.narvii.com/6829/9377b1ae948d99a8df728f98c0c4366f34e3f6f6v2_hq.jpg',
            'stok_product' => 10,
            'kategori_product' => 'Akesesoris',
            'harga' => 500000,
            'user_id' => 1,
            'link_ecommerce' => 'https://shopee.co.id/CGBEE-Kaos-kaki-Warna-Polos-Motif-Pendek-Dibawah-Mata-Kaki-lucu-fashion-S400-i.1128227340.24305741026?sp_atk=71420ed3-cbcd-4b5a-9c72-ba8b978708d3&xptdk=71420ed3-cbcd-4b5a-9c72-ba8b978708d3'
          ]);
    }
}
