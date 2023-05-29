<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        if ($categories->isEmpty()) {
            $this->command->info('No categories found. Please add the categories first.');
            return;
        }
        $subcategories = [
            [
                'name' => 'Subcategory1',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'category_id' => $categories->random()->id,
            ],
            [
                'name' => 'Subcategory2',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'category_id' => $categories->random()->id,
            ],
        ];
        foreach ($subcategories as $subcategoryData) {
            Subcategory::create($subcategoryData);
        }
    }
}
