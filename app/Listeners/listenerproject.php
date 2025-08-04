<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\Project;
use App\Models\User;
use App\Events\eventproject;
use App\Mail\ProjMail;
use Illuminate\Support\Facades\Mail;

class listenerproject
{

    public function handle(eventproject $event): void
    {
        $user = $event->user;
        $project = $event->project;

        Mail::to($user->email)->send(new ProjMail($user, $project));
    }
}
