<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::firstOrNew([
            'slug' => 'category-1',
        ]);
        if (!$category->exists) {
            $category->fill([
                'name'       => 'Category 1',
                'image'            => 'pages/AAgCCnqHfLlRub9syUdw.jpg',
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'category-2',
        ]);
        if (!$category->exists) {
            $category->fill([
                'name'       => 'Category 2',
                'image'            => 'pages/AAgCCnqHfLlRub9syUdw.jpg',
            ])->save();
        }
    }
}
