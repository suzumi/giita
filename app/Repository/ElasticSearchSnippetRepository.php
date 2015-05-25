<?php

namespace App\Repository;

use App\Http\Controllers\Controller;

/**
 * スニペット検索エンジン
 * Class ElasticSearchSnippetRepository
 * @package App\Repository
 */
class ElasticSearchSnippetRepository extends Controller
{

    public function __construct()
    {
        $this->es = new \Elasticsearch\Client([
            'hosts' => ['localhost:9200']
        ]);
    }

    public function search($q)
    {
        $params['index'] = 'biita';
        $params['type']  = 'snippets';

        return $this->es->search([
            'body' => [
                'query' => [
                    'multi_match' => [
                        'query' => $q,
                        'fields' => ['title', 'body']
                    ]
                ]
            ]
        ]);
    }
}