<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\Skills;
use App\Models\User;
use App\Events\eventskills;
use App\Mail\PlanMail;
use Illuminate\Support\Facades\Mail;


class listenerskills
{

    public function handle(eventskills $event): void
    {
        $user = $event->user;
        $skill = $event->skills;

        Mail::to($user->email)->send(new PlanMail($user,$skill));
    }
}
