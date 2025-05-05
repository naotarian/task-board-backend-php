<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\ProjectMember;
use App\Models\User;

class ProjectMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $project = Project::first();

        if ($user && $project) {
            ProjectMember::create([
                'user_id' => $user->id,
                'project_id' => $project->id,
            ]);
        }
    }
}
