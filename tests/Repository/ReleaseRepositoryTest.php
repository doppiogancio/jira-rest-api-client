<?php

declare(strict_types=1);

namespace DoppioGancio\Jira\Tests\Repository;

use DateTime;
use DoppioGancio\Jira\Client;
use DoppioGancio\Jira\Domain\ProjectVersionsResult;
use DoppioGancio\Jira\Repository\ProjectRepository;
use DoppioGancio\MockedClient\HandlerBuilder;
use DoppioGancio\MockedClient\MockedGuzzleClientBuilder;
use DoppioGancio\MockedClient\Route\RouteBuilder;
use Http\Discovery\Psr17FactoryDiscovery;
use PHPUnit\Framework\TestCase;

use function assert;

class ReleaseRepositoryTest extends TestCase
{
    public function testList(): void
    {
        $repo = $this->getReleaseRepository();

        $result = $repo->versions('PM')->wait();
        assert($result instanceof ProjectVersionsResult);

        $this->assertCount(3, $result->getValues());
        $prefix = 'https://my-domain.atlassian.net/rest/api/3/project/PM/version';
        $this->assertEquals($prefix . '?maxResults=3&orderBy=-releaseDate&startAt=0', $result->getSelf());
        $this->assertEquals($prefix . '?maxResults=3&orderBy=-releaseDate&startAt=3', $result->getNextPage());
        $this->assertEquals(3, $result->getMaxResults());
        $this->assertEquals(0, $result->getStartAt());
        $this->assertEquals(246, $result->getTotal());
        $this->assertFalse($result->isLast());

        $release = $result->getValues()[1];

        $this->assertEquals('https://my-domain.atlassian.net/rest/api/3/version/10538', $release->getSelf());
        $this->assertEquals('10538', $release->getId());
        $this->assertEquals('2021-11-08.1', $release->getName());
        $this->assertFalse($release->isArchived());
        $this->assertTrue($release->isReleased());
        $this->assertNotNull($release->getReleaseDate());
        $this->assertEquals(DateTime::createFromFormat('Y-m-d', '2021-11-08'), $release->getReleaseDate());
        $this->assertEquals('07-nov 2021', $release->getUserReleaseDate());
        $this->assertEquals(10406, $release->getProjectId());
    }

    public function testSearch(): void
    {
        $repo          = $this->getReleaseRepository();
        $searchOptions = [
            'orderBy' => '-releaseDate',
            'maxResults' => '3',
        ];

        $result = $repo->versions('PM', $searchOptions)->wait();
        assert($result instanceof ProjectVersionsResult);

        $this->assertCount(3, $result->getValues());
        $this->assertEquals('2021-11-08.1', $result->getValues()[1]->getName());
    }

    public function getReleaseRepository(): ProjectRepository
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
                ->withPath('/rest/api/3/project/PM/version')
                ->withFileResponse(__DIR__ . '/../fixtures/release.list.json')
                ->build()
        );

        $client = (new MockedGuzzleClientBuilder($handlerBuilder))->build();

        return (new Client($client))->project();
    }
}
