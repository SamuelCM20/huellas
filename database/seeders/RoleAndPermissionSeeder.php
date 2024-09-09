<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{

  public function run()
  {
    $freepermissions = [
      Permission::create(['name' =>'products.home' ]),
      Permission::create(['name' => 'products.info',]),
      Permission::create(['name' => 'products.search',]),
      Permission::create(['name' => 'products.cart',]),
      Permission::create(['name' => 'users.profile',]),
      Permission::create(['name' => 'users.update',]),
      Permission::create(['name' => 'categories.allProducts',]),
      Permission::create(['name' => 'publications.index',]),
      Permission::create(['name' => 'publications.store',]),
      Permission::create(['name' => 'publications.destroy',]),
      Permission::create(['name' => 'coordinates.index',]),
      Permission::create(['name' => 'coordinates.store',]),
      Permission::create(['name' => 'coordinates.destroy',]),

    ];
    $permissionsAdmin = array_merge( [
      Permission::create(['name'=>'users.index',]),
      Permission::create(['name'=>'users.create',]),
      Permission::create(['name'=>'users.store',]),
      Permission::create(['name'=>'users.edit',]),
      Permission::create(['name'=>'users.destroy',]),
      Permission::create(['name'=>'products.index',]),
      Permission::create(['name'=>'products.show',]),
      Permission::create(['name'=>'products.store',]),
      Permission::create(['name'=>'products.update',]),
      Permission::create(['name'=>'products.destroy',]),
      Permission::create(['name'=>'categories.index',]),
      Permission::create(['name'=>'categories.get-all',]),
      Permission::create(['name'=>'categories.create',]),
      Permission::create(['name'=>'categories.store',]),
      Permission::create(['name'=>'categories.edit',]),
      Permission::create(['name'=>'categories.update',]),
      Permission::create(['name'=>'categories.destroy']),
    ],$freepermissions);


    $user = Role::create(['name' => 'user']);
    $user->givePermissionTo($freepermissions);
    $admin = Role::create(['name' => 'admin']);
    $admin->givePermissionTo($permissionsAdmin);
  }
}
