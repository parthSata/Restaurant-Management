<?php 

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        Customer::create([
            'name' => 'Vishal Ribdiya',
            'email' => 'vishalinfyom@gmail.com',
            'email_verified' => true,
            'status' => true,
            'orders_count' => 3,
        ]);

        // Add more dummy customers here...
    }
}
