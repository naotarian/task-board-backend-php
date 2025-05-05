<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            OrganizationRoleSeeder::class,
            UserSeeder::class,
            OrganizationSeeder::class,
            OrganizationUserSeeder::class,
            OrganizationUserRoleSeeder::class,
            ProjectRoleSeeder::class,
            ProjectSeeder::class,
            ProjectMemberSeeder::class,
            ProjectMemberRoleSeeder::class,
        ]);
    }
}
