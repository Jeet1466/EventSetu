<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin user
        \App\Models\User::create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // Client user
        \App\Models\User::create([
            'name' => 'Client User',
            'email' => 'client@test.com',
            'password' => bcrypt('password'),
            'role' => 'client',
        ]);

        // Vendor user - DJ (Price range: 10k-20k)
        \App\Models\User::create([
            'name' => 'DJ Vendor',
            'email' => 'dj@test.com',
            'password' => bcrypt('password'),
            'role' => 'vendor',
            'vendor_category_id' => 1, // DJ
            'price_range_id' => 1, // 10k-20k
        ]);

        // Vendor user - Decorator (Price range: 40k-50k)
        \App\Models\User::create([
            'name' => 'Decorator Vendor',
            'email' => 'decorator@test.com',
            'password' => bcrypt('password'),
            'role' => 'vendor',
            'vendor_category_id' => 2, // Decorator
            'price_range_id' => 4, // 40k-50k
        ]);

        // Vendor user - Caterer (Price range: 60k-70k)
        \App\Models\User::create([
            'name' => 'Caterer Vendor',
            'email' => 'caterer@test.com',
            'password' => bcrypt('password'),
            'role' => 'vendor',
            'vendor_category_id' => 3, // Caterer
            'price_range_id' => 6, // 60k-70k
        ]);
    }
}
