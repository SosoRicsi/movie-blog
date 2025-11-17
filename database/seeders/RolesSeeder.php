<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $perms = [
            'films.create', 'films.view', 'films.update', 'films.delete',
            'film_versions.create', 'film_versions.view', 'film_versions.update', 'film_versions.delete',
            'film_translations.create', 'film_translations.view', 'film_translations.update', 'film_translations.delete',
            'mail_domain.create', 'mail_domain.view', 'mail_domain.update', 'mail_domain.delete',
            'mail_user.create', 'mail_user.view', 'mail_user.update', 'mail_user.delete',
            'mail_alias.create', 'mail_alias.view', 'mail_alias.update', 'mail_alias.delete',
        ];

        foreach ($perms as $perm) {
            Permission::findOrCreate($perm, 'web');
        }

        $roles = [
            [
                'role' => 'user',
                'permissions' => ['films.view', 'film_versions.view', 'film_translations.view'],
            ],
            [
                'role' => 'super_admin',
                'permissions' => $perms,
            ],
        ];

        foreach ($roles as $role) {
            $created_role = Role::findOrCreate($role['role'], 'web');
            $created_role->givePermissionTo($role['permissions']);
        }
    }
}
