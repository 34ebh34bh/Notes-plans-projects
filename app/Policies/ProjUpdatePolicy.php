<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Project;

class ProjUpdatePolicy
{

    public function update(User $user, Project $Project){
        return $user->id === $Project->user_id;
    }

}
