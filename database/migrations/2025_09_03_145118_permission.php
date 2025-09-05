<?php

use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        app()['cache']->forget('spatie.permission.cache');

        $schemaRole = [
            "admin" => [
                "users" => ['create_users', 'update_users', 'delete_users', 'view_users'],
                "recipes" => ['create_recipes', 'update_recipes', 'delete_recipes', 'view_recipes'],
            ],
            "user" => [
                "recipes" => ['view_recipes'],
                "favorites"=>['view_favorites','create_favorites', 'delete_favorites'],
            ]
        ];

        foreach($schemaRole as $roleName => $entities) {
            $roleEntity = Role::create(['name' => $roleName]);
            foreach($entities as $entity => $permissions) {
                foreach ($permissions as $permissionName) {
                    $permissionRole = Permission::firstOrCreate(['name' => $permissionName]);
                    $roleEntity->givePermissionTo($permissionRole);
                    $permissionRole->assignRole($roleEntity);
                }
            }
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
