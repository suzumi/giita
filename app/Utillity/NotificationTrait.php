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
    public function notificationStore($snippetOwnerId, $commentUserId, $snippetId, $commentId)
    {
        \DB::table('notifications')
            ->insert([
                'snippet_owner_id' => $snippetOwnerId,
                'comment_user_id' => $commentUserId,
                'snippet_id' => $snippetId,
                'comment_id' => $commentId,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
    }

    /**
     * 通知一覧を取得
     * @param $userId
     * @param int $count
     * @return mixed
     */
    public function getNotification($userId, $count = 10)
    {
        //comment_userがあなたの投稿"snippet_name"にコメントしました。
        return \DB::table('notifications')
            ->join('snippets', 'notifications.snippet_id', '=', 'snippets.id')
            ->join('users', 'notifications.comment_user_id', '=', 'users.id')
            ->where('notifications.snippet_owner_id', '=', $userId)
            ->where('notifications.comment_user_id', '!=', $userId)
            ->select([
                '*',
                'notifications.id as notify_id',
                'notifications.created_at as notify_created_at',
                'notifications.updated_at as notify_updated_at'
            ])
            ->orderBy('notify_created_at', 'DESC')
            ->take($count)
            ->get();
    }

    /**
     * 通知をチェック
     * @param $ntyId
     */
    public function isNtyChecked($ntyId)
    {
        \DB::table('notifications')
            ->where('id', $ntyId)
            ->update([
                'unread_flg' => 0
            ]);
    }
}