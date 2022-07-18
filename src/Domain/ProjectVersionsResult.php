<?php

declare(strict_types=1);

namespace DoppioGancio\Jira\Domain;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\Type;

class ProjectVersionsResult
{
    private string $self;

    /** @Serializer\SerializedName("nextPage") */
    private string $nextPage;

    /** @Serializer\SerializedName("maxResults") */
    private int $maxResults;

    /** @Serializer\SerializedName("startAt") */
    private int $startAt;
    private int $total;

    /** @Serializer\SerializedName("isLast") */
    private bool $isLast;

    /**
     * @Type("array<int,DoppioGancio\Jira\Domain\ProjectVersion>")
     * @var ProjectVersion[]
     */
    private array $values;

    public function getSelf(): string
    {
        return $this->self;
    }

    public function setSelf(string $self): void
    {
        $this->self = $self;
    }

    public function getNextPage(): string
    {
        return $this->nextPage;
    }

    public function setNextPage(string $nextPage): void
    {
        $this->nextPage = $nextPage;
    }

    public function getMaxResults(): int
    {
        return $this->maxResults;
    }

    public function setMaxResults(int $maxResults): void
    {
        $this->maxResults = $maxResults;
    }

    public function getStartAt(): int
    {
        return $this->startAt;
    }

    public function setStartAt(int $startAt): void
    {
        $this->startAt = $startAt;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function setTotal(int $total): void
    {
        $this->total = $total;
    }

    public function isLast(): bool
    {
        return $this->isLast;
    }

    public function setIsLast(bool $isLast): void
    {
        $this->isLast = $isLast;
    }

    /**
     * @return ProjectVersion[]
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @param ProjectVersion[] $values
     */
    public function setValues(array $values): void
    {
        $this->values = $values;
    }
}
