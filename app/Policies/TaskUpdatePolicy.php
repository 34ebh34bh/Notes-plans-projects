<?php

namespace App\Policies;

use App\Models\User;
use App\Models\task;

class TaskUpdatePolicy
{
   public function update_plan(User $user, task $Task) {
       return $user->id === $Task->user_id;
   }

}
