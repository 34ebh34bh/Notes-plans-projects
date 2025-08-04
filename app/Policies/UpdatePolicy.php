<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Skills;
use App\Models\task;
use GuzzleHttp\Psr7\Request;

class UpdatePolicy
{
    public function update(User $user, Skills $skills) {
        return $user->id === $skills->user_id;
    }

    public function delete(User $user, Skills $skills) {
        return $user->id === $skills->user_id;
    }
}
