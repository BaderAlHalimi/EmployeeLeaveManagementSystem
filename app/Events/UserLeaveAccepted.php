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

class UserLeaveAccepted implements ShouldBroadcast
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
            new PrivateChannel('user.' . $this->userleave->user_id),
        ];
    }
    public function broadcastAs()
    {
        return 'accept-user-leave-request';
    }
    public function broadcastWith()
    {
        return [
            'id'=>$this->userleave->id,
            'user'=>$this->userleave->user->manager->name,
            'name'=>$this->userleave->leave->name,
            'link'=>route('employee.leave.view'),
        ];
    }
}
