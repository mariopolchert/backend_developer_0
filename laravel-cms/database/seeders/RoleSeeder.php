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
        foreach (self::ROLES as $role) {
            Role::create([
                'name' => $role,
            ])->each(function(Role $role){
                $role->user()->create();
            });
        }
    }
}
