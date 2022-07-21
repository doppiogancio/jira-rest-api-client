<?php

declare(strict_types=1);

namespace DoppioGancio\Jira\ResourceManager;

use DoppioGancio\Jira\Resource\IssueSearchResult;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Promise\PromiseInterface;
use League\Uri\UriTemplate;
use Psr\Http\Message\ResponseInterface;

class IssueManager extends BaseResourceManager
{
    /**
     * @param array<string,int|string> $params
     *
     * @throws GuzzleException
     */
    public function search(array $params = []): PromiseInterface
    {
        $uriTemplate = new UriTemplate(
            '/rest/api/3/search{?jql,maxResults,validateQuery,fields[]*,expand,properties,fieldsByKeys}'
        );

        $uri = $uriTemplate->expand($params);

        return $this->client->requestAsync('GET', (string) $uri)
            ->then(function (ResponseInterface $response) {
                return $this->serializer->deserialize(
                    (string) $response->getBody(),
                    IssueSearchResult::class,
                    'json'
                );
            });
    }
}
