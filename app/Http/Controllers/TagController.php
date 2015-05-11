<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Snippet;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function all()
    {
        $tags = Tag::paginate(30);
        return view('tag.tags')->with(compact('tags'));
    }

    public function tag()
    {
        dd('タグ名');
    }
}