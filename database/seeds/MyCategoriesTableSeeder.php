<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Category;

class MyCategoriesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::firstOrNew([
            'slug' => 'Coffee',
        ]);
        if (!$category->exists) {
            $category->fill([
                'parent_id' => 1,
                'id'    => 1,
                'name'  => 'Coffee',
                'image' => 'pages/AAgCCnqHfLlRub9syUdw.jpg',
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'category-1',
        ]);
        if (!$category->exists) {
            $category->fill([
                'parent_id' => 1,
                'name'       => 'Category 1',
                'image'            => 'pages/AAgCCnqHfLlRub9syUdw.jpg',
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'category-2',
        ]);
        if (!$category->exists) {
            $category->fill([
                'parent_id' => 1,
                'name'       => 'Category 2',
                'image'            => 'pages/AAgCCnqHfLlRub9syUdw.jpg',
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'single-origin',
        ]);
        if (!$category->exists) {
            $category->fill([
                'parent_id' => 1,
                'name'      => 'Single Origin',
                'image'     => 'pages/AAgCCnqHfLlRub9syUdw.jpg',
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'commercial-blend',
        ]);
        if (!$category->exists) {
            $category->fill([
                'parent_id' => 1,
                'name'      => 'Commercial Blend',
                'image'     => 'pages/AAgCCnqHfLlRub9syUdw.jpg',
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'ninety-plus',
        ]);
        if (!$category->exists) {
            $category->fill([
                'parent_id' => 1,
                'name'      => 'Ninety Plus',
                'image'     => 'pages/AAgCCnqHfLlRub9syUdw.jpg',
            ])->save();
        }
    }
}
