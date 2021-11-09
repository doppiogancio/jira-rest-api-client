<?php

declare(strict_types=1);

namespace DoppioGancio\Jira\Repository;

use DoppioGancio\Jira\Domain\IssueSearchResult;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Promise\PromiseInterface;
use JMS\Serializer\Serializer;
use Psr\Http\Message\ResponseInterface;

use function http_build_query;
use function sprintf;

class IssueRepository
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
    public function search(array $params = []): PromiseInterface
    {
        $url = 'https://sourceability.atlassian.net/rest/api/3/search';

        if (! empty($params)) {
            $url = sprintf('%s?%s', $url, http_build_query($params));
        }

        // https://sourceability.atlassian.net/rest/api/3/search
        //?jql=project%3DPM+AND+fixVersion%3D%22next-release%22&maxResults=100&fields=fixVersions%

        // https://sourceability.atlassian.net/rest/api/3/search
        //?jql=project=PM AND fixVersion="next-release"&maxResults=100&fields=fixVersions

        return $this->client->requestAsync('GET', $url)
            ->then(function (ResponseInterface $response) {
                return $this->serializer->deserialize(
                    (string) $response->getBody(),
                    IssueSearchResult::class,
                    'json'
                );
            });
    }
}
