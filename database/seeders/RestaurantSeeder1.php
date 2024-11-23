<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Hash; // Add this line


class RestaurantSeeder1 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Restaurant::create(attributes: [
            'restaurant_name' => 'Demo Restaurant',
            'restaurant_slug' => 'demo-restaurant',
            'contact_first_name' => 'John',
            'contact_last_name' => 'Doe',
            'contact_phone' => '1234567890',
            'contact_email' => 'seller@example.com',
            'password' => Hash::make('password'), // Hashed password
            'about_us' => 'This is a demo restaurant.',
            'short_about' => 'Demo restaurant description.',
            'service_type' => 'Dine-in',
            'status' => 'active',
            'currency' => 'USD',
            'restaurant_type' => 'Fast Food',
            'logo' => 'default-logo.png',
            'favicon' => 'default-favicon.png',
            'feature_image' => 'default-feature-image.png',
        ]);
    }
}
