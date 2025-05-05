<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Organization;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organization = Organization::first();

        if ($organization) {
            Project::create([
                'id' => Str::ulid(),
                'organization_id' => $organization->id,
                'name' => '開発プロジェクト',
                'thumbnail' => null,
            ]);

            Project::create([
                'id' => Str::ulid(),
                'organization_id' => $organization->id,
                'name' => '営業支援プロジェクト',
                'thumbnail' => null,
            ]);
        }
    }
}
