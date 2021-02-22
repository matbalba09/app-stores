<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 0; $x <= 10; $x++){
        DB::table('stores')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'address' => Str::random(10),
            'created_at' =>Carbon::now()->format('Y-m-d H-i-s'),
            'updated_at' =>Carbon::now()->format('Y-m-d H-i-s'),

        ]);
        }
        // \App\Models\User::factory(10)->create();
    }
}
