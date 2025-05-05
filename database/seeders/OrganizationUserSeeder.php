<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Organization;
use App\Models\OrganizationUser;
use App\Models\User;
use Illuminate\Support\Str;

class OrganizationUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $org = Organization::first();
        $users = User::all();

        foreach ($users as $user) {
            OrganizationUser::create([
                'id' => (string) Str::ulid(),
                'organization_id' => $org->id,
                'user_id' => $user->id,
            ]);
        }
    }
}
