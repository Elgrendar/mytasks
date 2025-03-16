<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProjectPolicy
{
    public function view(User $user, Project $project)
    {
        return $user->id === $project->desktop->user_id;
    }

    public function update(User $user, Project $project)
    {
        return $user->id === $project->desktop->user_id;
    }

    public function delete(User $user, Project $project)
    {
        return $user->id === $project->desktop->user_id;
    }
}
