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
        if(\Input::has('isWeekly')) {
            $weeklyTag = $tag->getRecentlyWeeklyTag();
            $all = Tag::all(['id', 'tag as text']);
            return [
                'tags' => $all,
                'wrTag' => $weeklyTag,
            ];
        }
        return Tag::all(['id', 'tag as text']);
    }
}