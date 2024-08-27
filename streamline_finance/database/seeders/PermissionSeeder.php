<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\permission_categories;
use Illuminate\Support\Facades\Schema;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        // Schema::disableForeignKeyConstraints();
        // DB::table('permissions')->truncate();
        // DB::table('permission_categories')->truncate();

        $categories=[
            //PERMISSIONS
            'Permission management' =>[
            'give_permissions',
            'revoke_permissions',
            'edit_permissions',
            'delete_permissions'],
            //ROLE_PERMISSIONS
            'Role management' => [
            'edit_roles',
            'delete_roles',
            'create_roles'],

             //USER_PERMISSIONS
             'User management' => [
             'edit_users',
             'delete_users',
             'create_users'],
             //CLIENT MANAGEMENTPERMISSIONS
             'Client management' => [
             'edit_clients',
             'delete_clients',
             'create_clients'],
             //CLIENT_PERMISSIONS
             'Client contact management' => [
             'edit_client_contacts',
             'delete_client_contacts',
             'create_client_contacts'],
             //CLIENT_ INVOICE PERMISSIONS
             'Client invoice management' => [
             'edit_client_invoices',
             'delete_client_invoices',
             'create_client_invoices'],
             
            ];
        
// ADD CATEGORIES

        foreach
        ($categories as $category => $permissions){
            permission_categories::firstOrCreate(['category_name' => $category]);
        }
        // ADD PERMISSIONS
        foreach
        ($permissions as $permission){
            Permission::firstOrCreate([
                'name' => $permission, 
                'permission_category_id' => permission_categories::where('category_name', $category)->first()->id]);

        }
        

        
    }
}
