<?php

declare(strict_types=1);

namespace DoppioGancio\Jira\ResourceManager;

use DoppioGancio\Jira\Resource\ProjectVersion;
use DoppioGancio\Jira\Resource\ProjectVersionsResult;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Promise\PromiseInterface;
use League\Uri\UriTemplate;
use Psr\Http\Message\ResponseInterface;

class VersionManager extends BaseResourceManager
{
    /**
     * @param array<string,int|string> $params
     *
     * @throws GuzzleException
     */
    public function list(string $projectID, array $params = []): PromiseInterface
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

    /**
     * @param array<string,int|string> $params
     */
    public function get(string $id, array $params = []): PromiseInterface
    {
        $uriTemplate = new UriTemplate(
            '/rest/api/3/version/{id}{?expand}'
        );

        $params['id'] = $id;

        $uri = $uriTemplate->expand($params);

        return $this->client->requestAsync('GET', (string) $uri)
            ->then(function (ResponseInterface $response) {
                return $this->serializer->deserialize(
                    (string) $response->getBody(),
                    ProjectVersion::class,
                    'json'
                );
            });
    }
}
