<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name_ar' => 'الأطعمة والمشروبات',
                'name_en' => 'Food & Beverages',
            ],
            [
                'name_ar' => 'ملابس',
                'name_en' => 'Apparel',
                
            ],
            [
                'name_ar' => 'الترفيه',
                'name_en' => 'Entertainment',
            ],
            [
                'name_ar'=>'السيارات',
                'name_en'=>'Motor',
            ]
            
        ]
        ;
        foreach ($categories as $category) {
            \App\Models\Category::create([
                'name_ar' => $category['name_ar'],
                'name_en' => $category['name_en'],
                'slug' => Str::slug($category['name_en']),
            ]);
        }
    }
}
