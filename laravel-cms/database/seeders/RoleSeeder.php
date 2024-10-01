<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public const ROLES = ['Member', 'Writer', 'Admin'];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::ROLES as $roleName) {
            $role = Role::create([
                'name' => $roleName,
            ]);

            User::factory(5)->create([
                'role_id' => $role->id
            ]);
        }
    }
}
