<?php

declare(strict_types=1);

namespace DoppioGancio\Jira\Tests\ResourceManager;

use DoppioGancio\Jira\ApiClient;
use DoppioGancio\Jira\Resource\IssueSearchResult;
use DoppioGancio\Jira\ResourceManager\IssueManager;
use DoppioGancio\MockedClient\HandlerBuilder;
use DoppioGancio\MockedClient\MockedGuzzleClientBuilder;
use DoppioGancio\MockedClient\Route\RouteBuilder;
use Http\Discovery\Psr17FactoryDiscovery;
use PHPUnit\Framework\TestCase;

use function assert;

class IssueManagerTest extends TestCase
{
    public function testList(): void
    {
        $repo = $this->getIssueRepository();

        $response = $repo->search([])->wait();
        assert($response instanceof IssueSearchResult);

        $this->assertEquals('names,schema', $response->getExpand());
        $this->assertEquals(1, $response->getTotal());
        $this->assertEquals(0, $response->getStartAt());
        $this->assertEquals(50, $response->getMaxResults());

        $this->assertCount(1, $response->getIssues());

        $issue = $response->getIssues()[0];
        $this->assertEquals('', $issue->getExpand());
        $this->assertEquals('10002', $issue->getId());
        $this->assertEquals('https://your-domain.atlassian.net/rest/api/3/issue/10002', $issue->getSelf());
        $this->assertEquals('ED-1', $issue->getKey());
    }

    public function testSearch(): void
    {
        $repo          = $this->getIssueRepository();
        $searchOptions = [
            'jql' => 'project=MyProj AND fixVersion="next-release"',
            'maxResults' => 10,
            'fields' => 'fixVersions',
        ];

        $response = $repo->search($searchOptions)->wait();
        assert($response instanceof IssueSearchResult);

        $this->assertCount(1, $response->getIssues());
        $this->assertEquals('ED-1', $response->getIssues()[0]->getKey());
    }

    public function getIssueRepository(): IssueManager
    {
        $handlerBuilder = new HandlerBuilder(
            Psr17FactoryDiscovery::findServerRequestFactory()
        );

        $rb = new RouteBuilder(
            Psr17FactoryDiscovery::findResponseFactory(),
            Psr17FactoryDiscovery::findStreamFactory(),
        );

        $handlerBuilder->addRoute(
            $rb->new()
                ->withMethod('GET')
                ->withPath('/rest/api/3/search')
                ->withFileResponse(__DIR__ . '/../fixtures/issue.search.json')
                ->build()
        );

        $client = (new MockedGuzzleClientBuilder($handlerBuilder))->build();

        return (new ApiClient($client))->issue();
    }
}
