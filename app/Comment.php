<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    protected $table = 'comments';

    protected $fillable = [
        'user_id',
        'snippet_id',
        'comment'
    ];

    public static function commentList($snippetId)
    {
        return \DB::table('comments')
            ->leftjoin('users', 'comments.user_id', '=', 'users.id')
            ->where('comments.snippet_id', '=', $snippetId)
            ->orderBy('comments.created_at')
            ->select([
                '*',
                'comments.id as comment_id',
                'comments.created_at as created_at'
            ])
            ->get();
    }

}
