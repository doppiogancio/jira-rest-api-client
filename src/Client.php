<?php

declare(strict_types=1);

namespace DoppioGancio\Jira;

use DoppioGancio\Jira\Repository\IssueRepository;
use DoppioGancio\Jira\Repository\ReleaseRepository;
use GuzzleHttp\ClientInterface;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;

class Client
{
    private ClientInterface $client;
    private Serializer $serializer;

    public function __construct(ClientInterface $client)
    {
        $this->client     = $client;
        $this->serializer = SerializerBuilder::create()->build();
    }

    public function issue(): IssueRepository
    {
        return new IssueRepository(
            $this->client,
            $this->serializer
        );
    }

    public function release(): ReleaseRepository
    {
        return new ReleaseRepository(
            $this->client,
            $this->serializer
        );
    }
}
