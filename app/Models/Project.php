<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use App\Models\ProjectMember;
use App\Models\Organization;

class Project extends Model
{
    use HasUlids;

    protected $fillable = [
        'organization_id',
        'name',
        'description',
        'thumbnail',
        'is_archived',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function members()
    {
        return $this->hasMany(ProjectMember::class);
    }
}
