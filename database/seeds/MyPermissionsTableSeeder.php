<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Traits\Seedable;

class MyPermissionsTableSeeder extends Seeder
{
	use Seedable;

    protected $seedersPath = __DIR__.'/';
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        Permission::generateFor('coffees');

        $this->seed('PermissionRoleTableSeeder');
    }
}
