<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProjectRole;

class ProjectRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['key' => 'owner', 'label' => 'オーナー'],
            ['key' => 'admin', 'label' => '管理者'],
            ['key' => 'member', 'label' => 'メンバー'],
        ];

        foreach ($roles as $role) {
            ProjectRole::updateOrCreate(['key' => $role['key']], $role);
        }
    }
}
