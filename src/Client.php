<?php

declare(strict_types=1);

namespace DoppioGancio\Jira;

use DoppioGancio\Jira\Repository\IssueRepository;
use DoppioGancio\Jira\Repository\ProjectRepository;
use DoppioGancio\Jira\Repository\VersionRepository;
use GuzzleHttp\ClientInterface;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;

class Client
{
    private ClientInterface $client;
    private Serializer $serializer;

    private IssueRepository $issue;
    private ProjectRepository $project;
    private VersionRepository $version;

    public function __construct(ClientInterface $client)
    {
        $this->client     = $client;
        $this->serializer = SerializerBuilder::create()->build();

        $this->issue = new IssueRepository(
            $this->client,
            $this->serializer
        );

        $this->project = new ProjectRepository(
            $this->client,
            $this->serializer
        );

        $this->version = new VersionRepository(
            $this->client,
            $this->serializer
        );
    }

    public function issue(): IssueRepository
    {
        return $this->issue;
    }

    public function project(): ProjectRepository
    {
        return $this->project;
    }

    public function version(): VersionRepository
    {
        return $this->version;
    }
}
