<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Project;

class ProjectUser extends Model
{
    protected $fillable = [
        'user_id',
        'project_id',
    ];

    public function users () {
        return $this->belongsTo(User::class);
    }

    public function projects () {
        return $this->belongsTo(Project::class);
    }
    


}
