<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\ProjectUser;

class Project extends Model
{
      protected $fillable = [
        'user_id',
        'name',
        'description',
    ];

    public function ProjectUsers () {
        return $this->hasMany(ProjectUser::class);
    }
    public function users () {
        return $this->belongsTo(User::class);
    }

}
