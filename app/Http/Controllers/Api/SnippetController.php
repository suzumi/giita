<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SnippetController extends Controller
{

    public function preview(Request $request)
    {
        $input = $request->all();
        $parser = new \cebe\markdown\GithubMarkdown();
        return $parser->parse($input['raw_body']);
    }
}