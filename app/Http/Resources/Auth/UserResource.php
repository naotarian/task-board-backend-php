<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'organizations' => $this->organizationUsers
                ->map(fn($orgUser) => [
                    'id' => $orgUser->organization->id,
                    'name' => $orgUser->organization->name,
                ])
                ->unique('id')
                ->values(),
        ];
    }
}
