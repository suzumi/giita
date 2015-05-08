<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;

class SnippetController extends BaseApiController
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
        try {

            User::postStock($input);
            return $this->buildSuccess();

        } catch(\Exception $e) {

            return $this->buildError();
        }


    }

    /**
     * アンストックする
     * @param Request $request
     */
    public function unstock(Request $request)
    {
        $input = $request->all();
        try {

            User::deleteStock($input);
            return $this->buildSuccess();

        } catch(\Exception $e) {

            return $this->buildError();
        }
    }

    /**
     * ストックしてるか存在チェック
     * @param Request $request
     */
    public function stocked(Request $request)
    {
        $input = $request->all();
        $result = User::isStocked($input['user_id'], $input['snippet_id']);
        return $result->exists;
    }
}