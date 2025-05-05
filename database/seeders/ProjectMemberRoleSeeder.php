<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProjectMember;
use App\Models\ProjectRole;
use App\Models\ProjectMemberRole;

class ProjectMemberRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $member = ProjectMember::first();
        $role = ProjectRole::where('key', 'owner')->first();

        if ($member && $role) {
            ProjectMemberRole::create([
                'project_member_id' => $member->id,
                'role_id' => $role->id,
            ]);
        }
    }
}
