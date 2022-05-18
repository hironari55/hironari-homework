<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class RestaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $junkFoods = ['マクドナルド','モスバーガー','ケンタッキー'];
        foreach ($junkFoods as $junkFood) {
            $restaurant = new Restaurant();
            $restaurant->name = $junkFood;
            $restaurant->save();
        }
}
}
