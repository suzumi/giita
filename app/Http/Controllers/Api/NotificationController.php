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

    /**
     * アンストックする
     * @param Request $request
     */
    public function unstock(Request $request)
    {
        $input = $request->all();
        try {

            User::deleteStock($input);
            return $this->buildSuccess();

        } catch(\Exception $e) {

            return $this->buildError();
        }
    }

    /**
     * ストックしてるか存在チェック
     * @param Request $request
     */
    public function stocked(Request $request)
    {
        $input = $request->all();
        $result = User::isStocked($input['user_id'], $input['snippet_id']);
        return $result->exists;
    }

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