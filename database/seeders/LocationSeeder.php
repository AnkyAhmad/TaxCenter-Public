<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Kavist\RajaOngkir\Facades\RajaOngkir;
use App\Models\Province;
use App\Models\Regency;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $daftarProvinsi = RajaOngkir::provinsi()->all();
        foreach ($daftarProvinsi as $provinceRow) {
            Province::create([
                'id' => $provinceRow['province_id'],
                'name' => $provinceRow['province']
            ]);
            $daftarKota = RajaOngkir::kota()->dariProvinsi($provinceRow['province_id'])->get();
            foreach ($daftarKota as $cityRow) {
                Regency::create([
                    'id' => $cityRow['city_id'],
                    'provinces_id' => $provinceRow['province_id'],
                    'type' => $cityRow['type'],
                    'name' => $cityRow['city_name']
                ]);
            }
        }
    }
}
