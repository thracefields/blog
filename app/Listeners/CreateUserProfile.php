<?php

namespace App\Listeners;

use App\Events\UserCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Profile;

class CreateUserProfile
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        $profile = new Profile;
        $profile->user_id  = $event->user->id;
        $profile->save();
    }
}
