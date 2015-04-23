<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SnippetController extends Controller
{

    /**
     * リアルタイムプレビューを表示する
     * @param Request $request
     * @return string
     */
    public function preview(Request $request)
    {
        $input = $request->all();
        $parser = new \cebe\markdown\GithubMarkdown();
        return $parser->parse($input['body']);
    }

    /**
     * ストックする
     * @param Request $request
     */
    public function stock(Request $request)
    {
        $input = $request->all();
    }

    /**
     * アンストックする
     * @param Request $request
     */
    public function unstock(Request $request)
    {
        //
    }
}