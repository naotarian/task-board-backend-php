<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class ProjectRole extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'project_roles';

    protected $fillable = [
        'key',
        'name',
    ];

    public $incrementing = false;
    protected $keyType = 'string';
}
