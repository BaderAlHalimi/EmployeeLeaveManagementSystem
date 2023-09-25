<?php

namespace App\Listeners;

use App\Models\Stream;
use App\Models\UserLeave;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Str;

class PostLeaveRequestInAdminDashboardStream
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
    public function handle($event): void
    {
        $userleave = $event->userleave;
        $content = $userleave->user->name." added a new ".$userleave->leave->name." leave request";
        Stream::create([
            // 'id' => Str::uuid(),
            'user_id' => $userleave->user->manager->id,
            'content' => $content,
            'link' => route('allLeaves'),
        ]);
    }
}
