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
        Permission::create(['name'=>'create_role']);
        Permission::create(['name'=>'read_role']);
        Permission::create(['name'=>'update_role']);
        Permission::create(['name'=>'delete_role']);
        Permission::create(['name'=>'create_user']);
        Permission::create(['name'=>'read_user']);
        Permission::create(['name'=>'update_user']);
        Permission::create(['name'=>'delete_user']);
        Permission::create(['name'=>'create_category']);
        Permission::create(['name'=>'read_category']);
        Permission::create(['name'=>'update_category']);
        Permission::create(['name'=>'delete_category']);
        Permission::create(['name'=>'create_blog']);
        Permission::create(['name'=>'read_blog']);
        Permission::create(['name'=>'update_blog']);
        Permission::create(['name'=>'delete_blog']);
    }
}
