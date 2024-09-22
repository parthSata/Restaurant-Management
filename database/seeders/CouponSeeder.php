<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('coupons')->insert([
            [
                'name' => 'FESTIVALOFFER',
                'type' => 'percentage',
                'discount' => 10.00,
                'expiry_date' => Carbon::create('2023', '05', '20'),
                'status' => 'draft',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'FLATE40OFF',
                'type' => 'fixed',
                'discount' => 400.00,
                'expiry_date' => Carbon::create('2023', '05', '21'),
                'status' => 'publish',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ABCDEF0007',
                'type' => 'percentage',
                'discount' => 5.00,
                'expiry_date' => Carbon::create('2023', '05', '18'),
                'status' => 'publish',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'FLAT20',
                'type' => 'fixed',
                'discount' => 500.00,
                'expiry_date' => Carbon::create('2023', '05', '19'),
                'status' => 'publish',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
