<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	public function snippets()
    {
        return $this->belongsToMany('App\Snippet');
    }

}
