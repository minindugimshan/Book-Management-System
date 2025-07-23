<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Subcategory;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $literature = Category::create(['name' => 'Literature']);
        $science = Category::create(['name' => 'Science']);
        $history = Category::create(['name' => 'History']);

        // Literature subcategories
        $literatureSubs = [
            'Genres',
            'Periods',
            'Regions & Cultures',
            'Literary Analysis',
            'Authors & Works',
        ];
        foreach ($literatureSubs as $name) {
            Subcategory::create([
                'name' => $name,
                'category_id' => $literature->id,
            ]);
        }

        // Science subcategories
        $scienceSubs = [
            'Physical Sciences',
            'Life Sciences',
            'Formal Sciences',
            'Applied Sciences',
            'Scientific Method & Philosophy',
        ];
        foreach ($scienceSubs as $name) {
            Subcategory::create([
                'name' => $name,
                'category_id' => $science->id,
            ]);
        }

        // History subcategories
        $historySubs = [
            'Periods of History',
            'Regions',
            'Themes & Topics',
            'Biographies & Events',
            'Historiography',
        ];
        foreach ($historySubs as $name) {
            Subcategory::create([
                'name' => $name,
                'category_id' => $history->id,
            ]);
        }
    }
} 