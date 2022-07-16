<?php

declare(strict_types=1);

namespace DoppioGancio\Jira\Repository;

use DoppioGancio\Jira\Domain\ProjectVersionsResult;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Promise\PromiseInterface;
use JMS\Serializer\Serializer;
use League\Uri\UriTemplate;
use Psr\Http\Message\ResponseInterface;

class ProjectRepository
{
    private ClientInterface $client;
    private Serializer $serializer;

    public function __construct(ClientInterface $client, Serializer $serializer)
    {
        $this->client     = $client;
        $this->serializer = $serializer;
    }

    /**
     * @param array<string,int|string> $params
     *
     * @throws GuzzleException
     */
    public function versions(string $projectID, array $params = []): PromiseInterface
    {
        $params['project'] = $projectID;

        $uriTemplate = new UriTemplate(
            '/rest/api/3/project/{project}/version{?startAt,maxResults,orderBy,query,status,expand}'
        );

        $uri = $uriTemplate->expand($params);

        return $this->client->requestAsync('GET', (string) $uri)
            ->then(function (ResponseInterface $response) {
                return $this->serializer->deserialize(
                    (string) $response->getBody(),
                    ProjectVersionsResult::class,
                    'json'
                );
            });
    }
}
