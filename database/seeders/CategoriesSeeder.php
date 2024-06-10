<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            'Woodworking',
            'Plumbing',
            'Electrical',
            'Painting',
            'Gardening and Landscaping',
            'Home Improvement',
            'Automotive',
            'Crafts and DIY Decor',
            'Technology and Electronics',
            'Automated and Smart Home Projects'
        ];

        foreach ($categories as $categoryName) {
            Category::create(['name' => $categoryName]);
        }
    }
}
