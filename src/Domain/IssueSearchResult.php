<?php

declare(strict_types=1);

namespace DoppioGancio\Jira\Domain;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\Type;

class IssueSearchResult
{
    private string $expand;

    /**
     * @Serializer\SerializedName("startAt")
     * @var int
     */
    private int $startAt;

    /**
     * @Serializer\SerializedName("maxResults")
     * @var int
     */
    private int $maxResults;
    private int $total;

    /**
     * @Type("array<int,DoppioGancio\Jira\Domain\Issue>")
     * @var Issue[]
     */
    private array $issues;

    public function getExpand(): string
    {
        return $this->expand;
    }

    public function getStartAt(): int
    {
        return $this->startAt;
    }

    public function getMaxResults(): int
    {
        return $this->maxResults;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @return Issue[]
     */
    public function getIssues(): array
    {
        return $this->issues;
    }
}
