<?php

namespace App\Repository;

use App\Http\Controllers\Controller;
use App\Snippet;

class ElasticSearchRepository extends Controller
{

    private $client;
    private $model;

    public function __construct(Snippet $snippet)
    {
        $this->client = new \Elasticsearch\Client();
        $this->model = $snippet;
    }

    public function search()
    {
        $this->client->search([]);
    }
}