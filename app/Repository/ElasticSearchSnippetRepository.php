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
        $params['body']['query']['match']['title'] = $q;
        return $this->es->search($params);

        return $query = $this->es->search([
            'body' => [
                'query' => [
                    'bool' => [
                        'should' => [
                            ['match' => ['title' => $q]],
                            ['match' => ['body' => $q]]
                        ]
                    ]
                ]
            ]
        ]);
    }
}