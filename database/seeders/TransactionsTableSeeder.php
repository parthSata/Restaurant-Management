<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transactions')->insert([
            [
                'transaction_id' => 'TRX12345',
                'payment_gateway' => 'PayPal',
                'amount' => 349.00,
                'payment_status' => 'Approved',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'transaction_id' => 'TRX12346',
                'payment_gateway' => 'Stripe',
                'amount' => 99.00,
                'payment_status' => 'Rejected',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Add more dummy data as needed
        ]);
    }
}
