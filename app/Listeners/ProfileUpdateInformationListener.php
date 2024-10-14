<?php

namespace App\Listeners;

use App\Events\ProfileUpdateInformationEvent;
use App\Models\ActivityLogs;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProfileUpdateInformationListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProfileUpdateInformationEvent $event): void
    {
        dd("updated");
        ActivityLogs::create([
            'log_action' => $event->user->name." updated his profile",
        ]);
    }
}
