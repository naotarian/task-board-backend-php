<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class ProjectMemberRole extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'project_member_roles';

    protected $fillable = [
        'project_member_id',
        'role_id',
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    public function member()
    {
        return $this->belongsTo(ProjectMember::class, 'project_member_id');
    }

    public function role()
    {
        return $this->belongsTo(ProjectRole::class, 'role_id');
    }
}
