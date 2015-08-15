<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use App\Utillity\NotificationTrait;
use Carbon\Carbon;

class NotificationController extends BaseApiController
{

    use NotificationTrait;

    public function checkNotifications()
    {
        $notifications = $this->getNotification(\Auth::user()->id);
        $notificationsTimeAgo = array_map(function($e){
            $h = Carbon::parse($e->notify_created_at);
            return $h->diffForHumans();
        }, $notifications);

        return compact('notifications', 'notificationsTimeAgo');
    }
}