<?php

namespace DoppioGancio\Jira\Repository;

use GuzzleHttp\ClientInterface;
use JMS\Serializer\Serializer;

abstract class AbstractRepository
{
    protected ClientInterface $client;
    protected Serializer $serializer;

    public function __construct(ClientInterface $client, Serializer $serializer)
    {
        $this->client     = $client;
        $this->serializer = $serializer;
    }
}