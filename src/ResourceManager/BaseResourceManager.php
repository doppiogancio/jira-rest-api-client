<?php

declare(strict_types=1);

namespace DoppioGancio\Jira\ResourceManager;

use GuzzleHttp\ClientInterface;
use JMS\Serializer\Serializer;

abstract class BaseResourceManager
{
    protected ClientInterface $client;
    protected Serializer $serializer;

    public function __construct(ClientInterface $client, Serializer $serializer)
    {
        $this->client     = $client;
        $this->serializer = $serializer;
    }
}
