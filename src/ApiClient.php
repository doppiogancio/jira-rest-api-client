<?php

declare(strict_types=1);

namespace DoppioGancio\Jira;

use DoppioGancio\Jira\ResourceManager\IssueManager;
use DoppioGancio\Jira\ResourceManager\ProjectManager;
use DoppioGancio\Jira\ResourceManager\VersionManager;
use GuzzleHttp\ClientInterface as HttpClient;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;

class ApiClient
{
    private HttpClient $client;
    private Serializer $serializer;

    private IssueManager $issue;
    private ProjectManager $project;
    private VersionManager $version;

    public function __construct(HttpClient $client)
    {
        $this->client     = $client;
        $this->serializer = SerializerBuilder::create()->build();

        $this->issue = new IssueManager(
            $this->client,
            $this->serializer
        );

        $this->project = new ProjectManager(
            $this->client,
            $this->serializer
        );

        $this->version = new VersionManager(
            $this->client,
            $this->serializer
        );
    }

    public function issue(): IssueManager
    {
        return $this->issue;
    }

    public function project(): ProjectManager
    {
        return $this->project;
    }

    public function version(): VersionManager
    {
        return $this->version;
    }
}
