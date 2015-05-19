<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Snippet;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TagController extends Controller
{

    private $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
        $this->middleware('auth');
    }

    /**
     * タグ一覧
     * @return $this
     */
    public function all()
    {
        $tags = $this->tag->paginate(30);
        return view('tag.tags')->with(compact('tags'));
    }

    /**
     * タグ検索一覧
     * @param $tagName
     * @return $this
     */
    public function tag($tagName)
    {
        try {

            $tag = $this->tag->where('tag', 'like', $tagName)->firstOrFail();

            $snippetsWithTag = $this->tag->getSnippetWithTags($tag->id);
            $tagCount = $this->tag->getSnippetWithTagsCount($tag->id);
            return view('tag.tagSearch')->with(compact('tag', 'snippetsWithTag', 'tagCount'));

        } catch(ModelNotFoundException $e) {

            return \Response::view('errors.404', [], '404');

        }

    }
}