<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Traits\Seedable;

class MyDatabaseSeederAfterVoyager extends Seeder
{
    use Seedable;

    protected $seedersPath = __DIR__.'/';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seed('MyDataTypesTableSeeder');
        $this->seed('MyDataRowsTableSeeder');
        $this->seed('MyPermissionsTableSeeder');
    }
}
