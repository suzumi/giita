<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Snippet extends Model {

    protected $table = 'snippets';

    protected $fillable = [
        'title',
        'body',
        'user_id'
    ];

//    public function getTags()
//    {
//        return DB::table('snippets')
//            ->leftjoin('snippet_tag', 'snippets.id', '=', 'snippet_tag.snippet_id')
//            ->leftjoin('tags', 'tags.id', '=', 'snippet_tag.tag_id')
//            ->get();
//    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'snippet_tag', 'snippet_id', 'tag_id')->withTimestamps();
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
