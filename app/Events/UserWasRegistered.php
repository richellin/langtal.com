<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use App\User;

class UserWasRegistered extends Event
{
    use SerializesModels;
    
    /**
     * @var User
     */
    public $user;
    
    /**
     * Create a new event instance.
     * @param User
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
