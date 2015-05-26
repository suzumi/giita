<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function all()
    {
        $tag = new Tag;
        $all = Tag::all(['id', 'tag as text']);
        if(\Input::has('isWeekly')) {
            $weeklyTag = $tag->getRecentlyWeeklyTag();
            return [
                'tags' => $all,
                'wrTag' => $weeklyTag,
            ];
        }
        return $all;
    }
}