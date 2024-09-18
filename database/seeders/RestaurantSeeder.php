<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('restaurants')->insert([
            [
                'restaurant_name' => 'Har Bhole Restaurant',
                'contact_first_name' => 'Har',
                'contact_last_name' => 'Bhole',
                'password' => Hash::make('password123'), // Hashing the password
                'service_type' => 'Dine-In',
                'restaurant_type' => 'Indian',
                'logo' => 'logo1.png',
                'favicon' => 'favicon1.ico',
                'feature_image' => 'feature_image1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'restaurant_name' => 'Shiva’s Delight',
                'contact_first_name' => 'Shiva',
                'contact_last_name' => 'Rao',
                'password' => Hash::make('password123'), // Hashing the password
                'service_type' => 'Takeaway',
                'restaurant_type' => 'Vegetarian',
                'logo' => 'logo2.png',
                'favicon' => 'favicon2.ico',
                'feature_image' => 'feature_image2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more entries as needed
        ]);
    }
}
