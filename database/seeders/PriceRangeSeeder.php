<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceRangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ranges = [
            ['label' => '₹10,000 - ₹20,000', 'min_amount' => 10000, 'max_amount' => 20000],
            ['label' => '₹20,000 - ₹30,000', 'min_amount' => 20000, 'max_amount' => 30000],
            ['label' => '₹30,000 - ₹40,000', 'min_amount' => 30000, 'max_amount' => 40000],
            ['label' => '₹40,000 - ₹50,000', 'min_amount' => 40000, 'max_amount' => 50000],
            ['label' => '₹50,000 - ₹60,000', 'min_amount' => 50000, 'max_amount' => 60000],
            ['label' => '₹60,000 - ₹70,000', 'min_amount' => 60000, 'max_amount' => 70000],
            ['label' => '₹70,000 - ₹80,000', 'min_amount' => 70000, 'max_amount' => 80000],
            ['label' => '₹80,000 - ₹90,000', 'min_amount' => 80000, 'max_amount' => 90000],
            ['label' => '₹90,000 - ₹1,00,000', 'min_amount' => 90000, 'max_amount' => 100000],
            ['label' => '₹1,00,000+', 'min_amount' => 100000, 'max_amount' => 999999],
        ];

        foreach ($ranges as $range) {
            \App\Models\PriceRange::create($range);
        }
    }
}
