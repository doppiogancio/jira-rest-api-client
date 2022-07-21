<?php

declare(strict_types=1);

namespace DoppioGancio\Jira\Resource;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\Type;

class IssueSearchResult
{
    private string $expand;

    /** @Serializer\SerializedName("startAt") */
    private int $startAt;

    /** @Serializer\SerializedName("maxResults") */
    private int $maxResults;
    private int $total;

    /**
     * @Type("array<int,DoppioGancio\Jira\Resource\Issue>")
     * @var Issue[]
     */
    private array $issues;

    public function getExpand(): string
    {
        return $this->expand;
    }

    public function setExpand(string $expand): void
    {
        $this->expand = $expand;
    }

    public function getStartAt(): int
    {
        return $this->startAt;
    }

    public function setStartAt(int $startAt): void
    {
        $this->startAt = $startAt;
    }

    public function getMaxResults(): int
    {
        return $this->maxResults;
    }

    public function setMaxResults(int $maxResults): void
    {
        $this->maxResults = $maxResults;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function setTotal(int $total): void
    {
        $this->total = $total;
    }

    /**
     * @return Issue[]
     */
    public function getIssues(): array
    {
        return $this->issues;
    }

    /**
     * @param Issue[] $issues
     */
    public function setIssues(array $issues): void
    {
        $this->issues = $issues;
    }
}
