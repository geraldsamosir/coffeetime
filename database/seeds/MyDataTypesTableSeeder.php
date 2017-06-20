<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class MyDataTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
     $dataType = $this->dataType('slug', 'coffees');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'coffees',
                'display_name_singular' => 'Coffee',
                'display_name_plural'   => 'Coffees',
                'icon'                  => 'voyager-cup',
                'model_name'            => 'App\\Coffee',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => 'Product Coffee',
            ])->save();
        }
    }

    $dataType = $this->dataType('name', 'categories');
        if ($dataType->exists) {
            $dataType->fill([
                'slug'                  => 'categories',
                'display_name_singular' => 'Category',
                'display_name_plural'   => 'Categories',
                'icon'                  => 'voyager-categories',
                'model_name'            => 'App\\Category',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

    /**
     * [dataType description].
     *
     * @param [type] $field [description]
     * @param [type] $for   [description]
     *
     * @return [type] [description]
     */
    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
}
