<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    protected $table = 'tags';

	public function snippets()
    {
        return $this->belongsToMany('App\Snippet', 'snippet_tag', 'snippet_id', 'tag_id')->withTimestamps();
    }

    /**
     * 検索されたタグが紐づくスニペットを取得
     * @param $tagId
     * @return mixed
     */
    public function getSnippetWithTags($tagId)
    {
        return \DB::table('snippet_tag')
            ->leftjoin('snippets', 'snippet_tag.snippet_id', '=', 'snippets.id')
            ->leftjoin('users', 'snippets.user_id', '=', 'users.id')
            ->where('snippet_tag.tag_id', '=', $tagId)
            ->orderBy('snippet_tag.created_at', 'desc')
            ->select([
                '*',
                'snippets.created_at as snippet_created_at'
            ])
            ->paginate(20);
    }

    /**
     * 最近追加された週報タグ
     * @return mixed
     */
    public function getRecentlyWeeklyTag()
    {
        return \DB::table('tags')
            ->where('tag', 'LIKE', '週報@%')
            ->orderBy('created_at', 'desc')
            ->first();
    }

}
