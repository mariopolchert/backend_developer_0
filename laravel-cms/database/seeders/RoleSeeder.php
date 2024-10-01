<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    private const ROLES = ['Member', 'Writer', 'Admin'];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::ROLES as $role) {
            Role::create([
                'name' => $role,
            ])->each(function(Role $role){
                User::factory(2)->create([
                    'role_id' => $role->id
                ]);
            });
        }
    }
}
