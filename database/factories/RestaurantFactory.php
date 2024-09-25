<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class RestaurantFactory extends Factory
{
    protected $model = \App\Models\Restaurant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $restaurantName = $this->faker->company;
        return [
            'restaurant_name' => $restaurantName,
            'restaurant_slug' => Str::slug($restaurantName),
            'contact_first_name' => $this->faker->firstName,
            'contact_last_name' => $this->faker->lastName,
            'contact_phone' => $this->faker->phoneNumber,
            'contact_email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password123'), // default password
            'about_us' => $this->faker->paragraph,
            'short_about' => $this->faker->sentence,
            'service_type' => $this->faker->randomElement(['Dine-in', 'Takeaway', 'Delivery']),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'currency' => $this->faker->currencyCode,
            'restaurant_type' => $this->faker->randomElement(['Casual Dining', 'Fine Dining', 'Cafe']),
            'logo' => '/Uploaded_Images/default_logo.png',
            'favicon' => '/Uploaded_Images/default_favicon.png',
            'feature_image' => '/Uploaded_Images/default_feature_image.png',
        ];
    }
}
