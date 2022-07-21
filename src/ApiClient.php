<?php

declare(strict_types=1);

namespace DoppioGancio\Jira;

use DoppioGancio\Jira\ResourceManager\IssueManager;
use DoppioGancio\Jira\ResourceManager\ProjectManager;
use DoppioGancio\Jira\ResourceManager\VersionManager;
use GuzzleHttp\ClientInterface as HttpClient;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use ReflectionException;

use function sprintf;
use function ucfirst;

/**
 * @method pippo()
 */
class ApiClient
{
    private HttpClient $client;
    private Serializer $serializer;

    private IssueManager $issue;
    private ProjectManager $project;
    private VersionManager $version;

    /**
     * @throws ReflectionException
     */
    public function __construct(HttpClient $client)
    {
        $this->client     = $client;
        $this->serializer = SerializerBuilder::create()->build();

        $resourceManagers = [
            'issue',
            'project',
            'version',
        ];

        foreach ($resourceManagers as $resourceManager) {
            $class                    = sprintf('DoppioGancio\Jira\ResourceManager\%sManager', ucfirst($resourceManager));
            $this->{$resourceManager} = new $class(
                $this->client,
                $this->serializer,
            );
        }
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
