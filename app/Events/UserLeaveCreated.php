<?php

namespace App\Events;

use App\Models\UserLeave;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserLeaveCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(public UserLeave $userleave)
    {
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('manager.' . $this->userleave->user->manager->id),
        ];
    }
    public function broadcastAs()
    {
        return 'user-leave-request';
    }
    public function broadcastWith()
    {
        return [
            'id'=>$this->userleave->id,
            'user'=>$this->userleave->user->name,
            'name'=>$this->userleave->leave->name,
            'link'=>route('allLeaves'),
        ];
    }
}
