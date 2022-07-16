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

    public function getNextPage(): string
    {
        return $this->nextPage;
    }

    public function getMaxResults(): int
    {
        return $this->maxResults;
    }

    public function getStartAt(): int
    {
        return $this->startAt;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function isLast(): bool
    {
        return $this->isLast;
    }

    /**
     * @return ProjectVersion[]
     */
    public function getValues(): array
    {
        return $this->values;
    }
}
