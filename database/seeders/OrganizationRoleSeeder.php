<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrganizationRole;
use Illuminate\Support\Str;

class OrganizationRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['key' => 'owner', 'name' => 'オーナー'],
            ['key' => 'admin', 'name' => '管理者'],
            ['key' => 'member', 'name' => 'メンバー'],
        ];

        foreach ($roles as $role) {
            OrganizationRole::create([
                'id' => (string) Str::ulid(),
                'key' => $role['key'],
                'label' => $role['name'],
            ]);
        }
    }
}
