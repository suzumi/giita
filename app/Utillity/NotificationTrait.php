<?php

namespace App\Utillity;

trait NotificationTrait {

    /**
     * 通知テーブルにストアする
     * @param $snippetOwnerId
     * @param $commentUserId
     * @param $snippetId
     * @param $commentId
     */
    public function notificationStore($snippetOwnerId, $commentUserId, $snippetId, $commentId) {
        \DB::table('notifications')
            ->insert([
                'snippet_owner_id' => $snippetOwnerId,
                'comment_user_id' => $commentUserId,
                'snippet_id' => $snippetId,
                'comment_id' => $commentId
            ]);
    }
}