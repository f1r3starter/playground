<?php

namespace Application;

use Elasticsearch\Client;

class ElasticClient
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function createIndex($name, $shards = 5, $replicas = 0)
    {
        return $this->client->indices()->create([
            'index' => $name,
            'body' => [
                'settings' => [
                    'number_of_shards' => $shards,
                    'number_of_replicas' => $replicas
                ]
            ]
        ]);
    }

    public function addRecord($index, $type, $body)
    {
        return $this->client->index([
            'index' => $index,
            'type' => $type,
            'body' => $body
        ]);
    }

    public function findRecord($index, $type, $body)
    {
        return $this->client->search([
            'index' => $index,
            'type' => $type,
            'body' => $body
        ]);
    }
}