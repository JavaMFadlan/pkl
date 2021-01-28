<?php

use Illuminate\Database\Seeder;

class Provinsi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinsis')->insert([
            ['kode_prov' => 11, 'nama_prov' => 'ACEH'],
            ['kode_prov' => 12, 'nama_prov' => 'SUMATERA UTARA'],
            ['kode_prov' => 13, 'nama_prov' => 'SUMATERA BARAT'],
            ['kode_prov' => 14, 'nama_prov' => 'RIAU'],
            ['kode_prov' => 15, 'nama_prov' => 'JAMBI'],
            ['kode_prov' => 16, 'nama_prov' => 'SUMATERA SELATAN'],
            ['kode_prov' => 17, 'nama_prov' => 'BENGKULU'],
            ['kode_prov' => 18, 'nama_prov' => 'LAMPUNG'],
            ['kode_prov' => 19, 'nama_prov' => 'KEPULAUAN BANGKA BELITUNG'],
            ['kode_prov' => 21, 'nama_prov' => 'KEPULAUAN RIAU'],
            ['kode_prov' => 31, 'nama_prov' => 'DKI JAKARTA'],
            ['kode_prov' => 32, 'nama_prov' => 'JAWA BARAT'],
            ['kode_prov' => 33, 'nama_prov' => 'JAWA TENGAH'],
            ['kode_prov' => 34, 'nama_prov' => 'DI YOGYAKARTA'],
            ['kode_prov' => 35, 'nama_prov' => 'JAWA TIMUR'],
            ['kode_prov' => 36, 'nama_prov' => 'BANTEN'],
            ['kode_prov' => 51, 'nama_prov' => 'BALI'],
            ['kode_prov' => 52, 'nama_prov' => 'NUSA TENGGARA BARAT'],
            ['kode_prov' => 53, 'nama_prov' => 'NUSA TENGGARA TIMUR'],
            ['kode_prov' => 61, 'nama_prov' => 'KALIMANTAN BARAT'],
            ['kode_prov' => 62, 'nama_prov' => 'KALIMANTAN TENGAH'],
            ['kode_prov' => 63, 'nama_prov' => 'KALIMANTAN SELATAN'],
            ['kode_prov' => 64, 'nama_prov' => 'KALIMANTAN TIMUR'],
            ['kode_prov' => 65, 'nama_prov' => 'KALIMANTAN UTARA'],
            ['kode_prov' => 71, 'nama_prov' => 'SULAWESI UTARA'],
            ['kode_prov' => 72, 'nama_prov' => 'SULAWESI TENGAH'],
            ['kode_prov' => 73, 'nama_prov' => 'SULAWESI SELATAN'],
            ['kode_prov' => 74, 'nama_prov' => 'SULAWESI TENGGARA'],
            ['kode_prov' => 75, 'nama_prov' => 'GORONTALO'],
            ['kode_prov' => 76, 'nama_prov' => 'SULAWESI BARAT'],
            ['kode_prov' => 81, 'nama_prov' => 'MALUKU'],
            ['kode_prov' => 82, 'nama_prov' => 'MALUKU UTARA'],
            ['kode_prov' => 91, 'nama_prov' => 'PAPUA BARAT'],
            ['kode_prov' => 94, 'nama_prov' => 'PAPUA']
        ]);
    }
}
