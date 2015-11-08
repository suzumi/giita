<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {

    protected $table = 'events';

    protected $fillable = [
        'event_title',
        'event_sponsor',
        'event_date',
        'event_time',
        'event_description',
        'event_eyecatch_img',
        'user_id',
        'event_youtube_video_id',
        'event_status',
    ];

}
