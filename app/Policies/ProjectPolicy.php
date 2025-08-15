<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Project;
use App\Models\ProjectUser;

class ProjectPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function create ()
    {
        return true;
    }

    public function allow(User $user, Project $project)
    {
     $projectUser = ProjectUser::where('user_id', $user->id)
     ->where('project_id', $project->id)
     ->exists();

     return $projectUser;
    }
}
