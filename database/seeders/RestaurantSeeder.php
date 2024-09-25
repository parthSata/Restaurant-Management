<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Hash;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Use the factory to create multiple restaurant records
        Restaurant::create([
            'restaurant_name' => 'The Gourmet Place',
            'restaurant_slug' => 'the-gourmet-place',
            'contact_first_name' => 'John',
            'contact_last_name' => 'Doe',
            'contact_phone' => '1234567890',
            'contact_email' => 'contact@gourmetplace.com',
            'password' => Hash::make('password123'),
            'about_us' => 'The best gourmet food in town!',
            'short_about' => 'Premium quality gourmet dishes',
            'service_type' => 'Dine-in',
            'status' => 'active',
            'currency' => 'USD',
            'restaurant_type' => 'Fine Dining',
            'logo' => '/Uploaded_Images/default_logo.png',
            'favicon' => '/Uploaded_Images/default_favicon.png',
            'feature_image' => '/Uploaded_Images/default_feature_image.png',
        ]);

        // Generate 10 dummy restaurants using Faker
    }
}
