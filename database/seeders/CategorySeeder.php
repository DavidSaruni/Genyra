<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'MedTech Solutions', 'slug' => 'medtech-solutions', 'sort_order' => 1],
            ['name' => 'BioSciences', 'slug' => 'biosciences', 'sort_order' => 2],
            ['name' => 'Calibration & Metrology', 'slug' => 'calibration-metrology', 'sort_order' => 3],
            ['name' => 'Health Systems Advisory', 'slug' => 'health-systems-advisory', 'sort_order' => 4],
            ['name' => 'Quality & Compliance', 'slug' => 'quality-compliance', 'sort_order' => 5],
            ['name' => 'Partnerships', 'slug' => 'partnerships', 'sort_order' => 6],
            ['name' => 'Digital Health', 'slug' => 'digital-health', 'sort_order' => 7],
            ['name' => 'Regional Coverage', 'slug' => 'regional-coverage', 'sort_order' => 8],
            ['name' => 'Awards & Recognition', 'slug' => 'awards-recognition', 'sort_order' => 9],
            ['name' => 'Company News', 'slug' => 'company-news', 'sort_order' => 10],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
