<?php

declare(strict_types=1);

namespace DoppioGancio\Jira\Domain;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\Type;

class ReleaseResults
{
    private string $self;

    /**
     * @Serializer\SerializedName("nextPage")
     * @var string
     */
    private string $nextPage;

    /**
     * @Serializer\SerializedName("maxResults")
     * @var int
     */
    private int $maxResults;

    /**
     * @Serializer\SerializedName("startAt")
     * @var int
     */
    private int $startAt;
    private int $total;

    /**
     * @Serializer\SerializedName("isLast")
     * @var bool
     */
    private bool $isLast;

    /** @var ReleaseResult[]  */

    /**
     * @Type("array<int,DoppioGancio\Jira\Domain\ReleaseResult>")
     * @var ReleaseResult[]
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
     * @return ReleaseResult[]
     */
    public function getValues(): array
    {
        return $this->values;
    }
}
