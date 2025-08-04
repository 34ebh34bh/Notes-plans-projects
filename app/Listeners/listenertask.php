<?php

namespace App\Listeners;

use App\Models\Skills;
use App\Mail\taskMail;
use App\Models\task;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Events\eventtask;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class listenertask
{
    public function handle(eventtask $event): void
    {
        $user = $event->user;
        $task = $event->task;


        Mail::to($user->email)->send(new taskMail($user, $task));
    }
}
