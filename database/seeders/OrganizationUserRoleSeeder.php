<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrganizationUser;
use App\Models\OrganizationUserRole;
use App\Models\OrganizationRole;
use Illuminate\Support\Str;

class OrganizationUserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orgUsers = OrganizationUser::all();
        $roles = OrganizationRole::pluck('id', 'key');

        foreach ($orgUsers as $index => $orgUser) {
            $roleKey = $index === 0 ? 'owner' : 'member';

            OrganizationUserRole::create([
                'id' => (string) Str::ulid(),
                'organization_user_id' => $orgUser->id,
                'role_id' => $roles[$roleKey],
            ]);
        }
    }
}
