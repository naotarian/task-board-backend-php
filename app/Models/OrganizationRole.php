<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\OrganizationUserRole;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class OrganizationRole extends Model
{
    use HasUlids;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['key', 'label'];

    public function organizationUserRoles(): HasMany
    {
        return $this->hasMany(OrganizationUserRole::class);
    }
}
