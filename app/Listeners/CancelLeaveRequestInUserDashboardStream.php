<?php

namespace App\Listeners;

use App\Models\Stream;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CancelLeaveRequestInUserDashboardStream
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
    public function handle(object $event): void
    {
        //
        $userleave = $event->userleave;
        $content = $userleave->user->manager->name." Cancelled Your leave request";
        
        Stream::create([
            // 'id' => Str::uuid(),
            'user_id' => $userleave->user_id,
            'content' => $content,
            'link' => route('employee.leave.view'),
        ]);
    }
}
