<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrganizationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'organizations' => $this->organizationUsers
                ->map(fn($orgUser) => [
                    'id' => $orgUser->organization->id,
                    'name' => $orgUser->organization->name,
                    'subdomain' => $orgUser->organization->subdomain,
                    'roles' => $orgUser->roles->map(fn($r) => [
                        'id' => $r->role->id,
                        'name' => $r->role->label,
                    ]),
                ])
        ];
    }
}
