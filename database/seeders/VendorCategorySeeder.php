<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'DJ', 'description' => 'Disc Jockey and Music Services'],
            ['name' => 'Decorator', 'description' => 'Event Decoration and Styling'],
            ['name' => 'Caterer', 'description' => 'Food and Catering Services'],
            ['name' => 'Photographer', 'description' => 'Photography and Videography'],
            ['name' => 'Venue', 'description' => 'Event Venues and Halls'],
            ['name' => 'Entertainment', 'description' => 'Live Entertainment and Performers'],
        ];

        foreach ($categories as $category) {
            \App\Models\VendorCategory::create($category);
        }
    }
}
