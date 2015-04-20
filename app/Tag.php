<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    protected $table = 'tags';

	public function snippets()
    {
        return $this->belongsToMany('App\Snippet', 'snippet_tag', 'snippet_id', 'tag_id')->withTimestamps();
    }

}
