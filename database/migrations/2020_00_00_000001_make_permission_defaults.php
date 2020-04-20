<?php

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Fjord\Support\Migration\MigratePermissions;
use Illuminate\Database\Migrations\Migration;

class MakePermissionDefaults extends Migration
{
    use MigratePermissions;

    protected $permissions = [
        // Fjord users.
        'create fjord-users',
        'read fjord-users',
        'update fjord-users',
        'delete fjord-users',
        // Fjord user roles.
        'create fjord-user-roles',
        'read fjord-user-roles',
        'update fjord-user-roles',
        'delete fjord-user-roles',
        // Fjord user role permissions.
        'read fjord-role-permissions',
        'update fjord-role-permissions'
    ];

    /**
     * Create roles and permissions.
     *
     * @return void
     */
    public function up()
    {
        Role::firstOrCreate(['guard_name' => 'fjord', 'name' => 'admin']);
        Role::firstOrCreate(['guard_name' => 'fjord', 'name' => 'user']);

        $this->upPermissions();
    }

    /**
     * Delete roles and permissions.
     *
     * @return void
     */
    public function down()
    {
        $this->downPermissions();

        Role::where(['guard_name' => 'fjord', 'name' => 'admin'])->delete();
        Role::where(['guard_name' => 'fjord', 'name' => 'user'])->delete();
    }
}
