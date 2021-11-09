<?php

declare(strict_types=1);

namespace DoppioGancio\Jira\Repository;

use DoppioGancio\Jira\Domain\ReleaseResult;
use DoppioGancio\Jira\Domain\ReleaseResults;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Promise\PromiseInterface;
use JMS\Serializer\Serializer;
use Psr\Http\Message\ResponseInterface;

use function http_build_query;
use function sprintf;

class ReleaseRepository
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
    public function list(array $params = []): PromiseInterface
    {
        $url = 'https://sourceability.atlassian.net/rest/api/3/project/PM/version';

        if (! empty($params)) {
            $url = sprintf('%s?%s', $url, http_build_query($params));
        }

        return $this->client->requestAsync('GET', $url)
            ->then(function (ResponseInterface $response) {
                return $this->serializer->deserialize(
                    (string) $response->getBody(),
                    ReleaseResults::class,
                    'json'
                );
            });
    }
}
