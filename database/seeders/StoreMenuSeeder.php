<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Decimal;

class StoreMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 0; $x <= 5; $x++){
            DB::table('store_menus')->insert([
                'menu_name' => Str::random(10),
                'price' => number_format(rand(0,1000), 2),
                'created_at' =>Carbon::now()->format('Y-m-d H-i-s'),
                'updated_at' =>Carbon::now()->format('Y-m-d H-i-s'),
    
            ]);
            }
        //
    }
}
