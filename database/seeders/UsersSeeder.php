<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all();

        $users = [
            ['name' => 'John Doe', 'email' => 'john@example.com', 'password' => Hash::make('password'), 'phone' => '1234567890', 'priceWork' => 50, 'location' => 'New York', 'bio' => 'Experienced woodworker', 'rating' => 4.5],
            ['name' => 'Jane Smith', 'email' => 'jane@example.com', 'password' => Hash::make('password'), 'phone' => '0987654321', 'priceWork' => 40, 'location' => 'San Francisco', 'bio' => 'Plumbing expert', 'rating' => 4.7],
            ['name' => 'Alice Johnson', 'email' => 'alice@example.com', 'password' => Hash::make('password'), 'phone' => '1122334455', 'priceWork' => 60, 'location' => 'Los Angeles', 'bio' => 'Expert electrician', 'rating' => 4.9],
            ['name' => 'Bob Brown', 'email' => 'bob@example.com', 'password' => Hash::make('password'), 'phone' => '2233445566', 'priceWork' => 45, 'location' => 'Chicago', 'bio' => 'Professional painter', 'rating' => 4.6],
            ['name' => 'Charlie Green', 'email' => 'charlie@example.com', 'password' => Hash::make('password'), 'phone' => '3344556677', 'priceWork' => 55, 'location' => 'Houston', 'bio' => 'Gardening and landscaping specialist', 'rating' => 4.8],
            ['name' => 'Daisy White', 'email' => 'daisy@example.com', 'password' => Hash::make('password'), 'phone' => '4455667788', 'priceWork' => 50, 'location' => 'Phoenix', 'bio' => 'Home improvement expert', 'rating' => 4.7],
            ['name' => 'Ethan Black', 'email' => 'ethan@example.com', 'password' => Hash::make('password'), 'phone' => '5566778899', 'priceWork' => 48, 'location' => 'Philadelphia', 'bio' => 'Automotive specialist', 'rating' => 4.5],
            ['name' => 'Fiona Blue', 'email' => 'fiona@example.com', 'password' => Hash::make('password'), 'phone' => '6677889900', 'priceWork' => 52, 'location' => 'San Antonio', 'bio' => 'Crafts and DIY decor expert', 'rating' => 4.9],
            ['name' => 'George Yellow', 'email' => 'george@example.com', 'password' => Hash::make('password'), 'phone' => '7788990011', 'priceWork' => 47, 'location' => 'San Diego', 'bio' => 'Technology and electronics expert', 'rating' => 4.8],
            ['name' => 'Hannah Pink', 'email' => 'hannah@example.com', 'password' => Hash::make('password'), 'phone' => '8899001122', 'priceWork' => 53, 'location' => 'Dallas', 'bio' => 'Smart home projects specialist', 'rating' => 4.7]
        ];

        foreach ($users as $userData) {
            $user = User::create($userData);

            $category = $categories->random();
            if (!$user->categories()->where('category_id', $category->id)->exists()) {
                $user->categories()->attach($category->id);
            }
        }
    }
}
