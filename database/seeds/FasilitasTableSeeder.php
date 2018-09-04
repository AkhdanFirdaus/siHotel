<?php

use Illuminate\Database\Seeder;
use App\Fasilitas;

class FasilitasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fasSing = new Fasilitas();
        $fasSing->tipe = "Single";        
        $fasSing->deskripsi = "Kamar untuk satu atau dua orang";
        $fasSing->harga = "300.000";
        $fasSing->save();

        $fasKel = new Fasilitas();
        $fasKel->tipe = "Keluarga";        
        $fasKel->deskripsi = "Kamar untuk anggota keluarga hingga 5 orang";
        $fasKel->harga = "420.000";
        $fasKel->save();

        $fasBis = new Fasilitas();
        $fasBis->tipe = "Bisnis";        
        $fasBis->deskripsi = "Kamar bisnis untuk satu atau dua orang dengan fasilitas terlengkap";
        $fasBis->harga = "500.000";
        $fasBis->save();
    }
}
