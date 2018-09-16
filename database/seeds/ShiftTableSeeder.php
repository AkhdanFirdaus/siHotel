<?php

use Illuminate\Database\Seeder;
use App\Shift;
use Carbon;

class ShiftTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shift1 = new Shift();
        $shift1->jamMasuk = Carbon::Now()->toDateTimeString();
        $shift1->jamKEluar = Carbon::Now()->toDateTimeString();
        $shift1->save();

        $shift2 = new Shift();
        $shift2->jamMasuk = Carbon::Now()->toDateTimeString();
        $shift2->jamKEluar = Carbon::Now()->toDateTimeString();
        $shift2->save();

        $shift3 = new Shift();
        $shift3->jamMasuk = Carbon::Now()->toDateTimeString();
        $shift3->jamKEluar = Carbon::Now()->toDateTimeString();
        $shift3->save();
    }
}
