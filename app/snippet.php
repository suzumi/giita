<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class snippet extends Model {

    protected $fillable = [
        'title',
        'body'
    ];

}
