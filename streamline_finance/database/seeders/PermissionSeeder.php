<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions=[
            //PERMISSIONS
            'give_permissions',
            'revoke_permissions',
            'edit_permissions',
            'delete_permissions',
            //USER_PERMISSIONS
            'edit_users',
            'delete_users',
            'create_users',
            //ROLE_PERMISSIONS
            'edit_roles',
            'delete_roles',
            'create_roles',
        ];
// ADD CATEGORIES
        foreach
        ($permissions as $permission){
            Permission::create(['name' => $permission]);
        }
        
    }
}
