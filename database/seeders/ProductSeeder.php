<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::get();
        $iphone = $categories->where('name', 'Iphone')->first();
        $samsung = $categories->where('name', 'Samsung')->first();
        $headset = $categories->where('name', 'Headset')->first();
        $powerBank = $categories->where('name', 'Power Bank')->first();
        $protection = $categories->where('name', 'Protection')->first();

        $iphone->products()
            ->save(new Product([
                'name' => 'Apple iPhone X - grey',
                'weight' => '500',
                'price' => '5148000',
                'status' => 'Publish',
                'image_url' => 'https://images.tokopedia.net/img/cache/700/VqbcmM/2021/4/4/dc653fbb-1094-4cae-9cbb-17fac9967593.jpg.webp?ect=4g',
                'description' => '<p><span class="css-11oczh8 e1iszlzh0"><span class="css-168ydy0 e1iszlzh1">KONDISI dan KELENGKAPAN :<br>+Sinyal Bisa All Oprator 4G LTE Garansi Sinyal Selamanya<br>+ Mesin : 100% Normal<br>+ Kondisi Fisik : new 100% Mulus,<br>+ Mesin 100% bersegel.<br>+ IMEI dan ICLOUD AMAN<br>+ FU ( bisa semua kartu gsm indonesia maupun mancanegara )<br>+ Garansi 1thn . Garansi berlaku apabila bukan faktor dari kelalaian pemakai / human error<br>+ PERHATIAN : batre dan aksesoris lainnya tidak bergaransi.<br>+ JIKA ada keluhan atau bermasalah bisa hub service center nomor tlp dan alamat tertera di kartu garansi <br>+ FULLSET TERSEGEL (dus, buku panduan, headset, charger, kabel data, Kartu Garansi)<br>+ barang replacement , Apa itu Replacement? <br>Replacement
                itu merupakan tukaran unit baru yang sebelumnya dilakukan klaim untuk 
               kerusakan iphone sebelumnya. tentunya barang pengganti ini tersegel 
               dusnya,jadi sama seperti anda membeli iphone baru yg masih bersegel 
               garansi 1tahun </span></span></p>',
               'created_at' => date("Y-m-d H:i:s", mt_rand(1629672511,1642546111)),
            ]));
        $iphone->products()
            ->save(new Product([
                'name' => 'Apple Iphone XS MAX - grey',
                'weight' => '500',
                'price' => '6218000',
                'status' => 'Publish',
                'image_url' => 'https://images.tokopedia.net/img/cache/700/VqbcmM/2021/6/7/dcf0d1e3-7aef-4133-8faf-26c25326b27d.jpg.webp?ect=4g',
                'description' => '<p><span class="css-11oczh8 e1iszlzh0"><span class="css-168ydy0 e1iszlzh1">Kondisi : <br>- Sinyal Bisa All Oprator 4G LTE Garansi Sinyal Selamanya<br>- mulus 100%<br>- Kualitas Jamin 100% ORIGINAL bukan replika!<br>-Mesin 100% prima/bagus dan awet<br>-Packing Buble wrap Tebal sangat aman&nbsp;</span></span></p><p><span class="css-11oczh8 e1iszlzh0"><span class="css-168ydy0 e1iszlzh1">KETERANGAN<br>1, Kelengkapan: Komplit Original<br>2, Garansi Handphone adalah 1 TAHUN, dimulai dari tanggal pengiriman barang.<br>3,
                Garansi tidak berlaku bagi kerusakan yang disebabkan oleh kesalahan 
               sendiri seperti kendala masuk air, jatuh, LCD retak, pemakaian kasar 
               atau kerusakan lain<br>4, Garansi tidak berlaku bagi handphone yang sudah pernah diperbaiki sendiri atau sampai merusak keadaan handphone<br>5, Original aksesoris seperti kotak, kabel USB, batok charger, H/F tidak termasuk dalam garansi<br>6, Ongkos setiap pengiriman barang ditanggung oleh<br>Pembeli</span></span></p>',
               'created_at' => date("Y-m-d H:i:s", mt_rand(1629672511,1642546111)),
            ]));
        
    }
}
