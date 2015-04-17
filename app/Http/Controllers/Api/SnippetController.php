<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class SnippetController extends Controller
{
    public function test()
    {
        echo 'Hello Test';
    }

    public function preview($markdown)
    {
        $parser = new \cebe\markdown\GithubMarkdown();
        return $parser->parse($markdown);
    }
}