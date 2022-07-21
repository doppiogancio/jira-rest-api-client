<?php

declare(strict_types=1);

namespace DoppioGancio\Jira\ResourceManager;

use DoppioGancio\Jira\Resource\ProjectVersionsResult;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Promise\PromiseInterface;
use League\Uri\UriTemplate;
use Psr\Http\Message\ResponseInterface;

class ProjectManager extends BaseResourceManager
{
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
