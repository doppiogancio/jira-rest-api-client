<?php

declare(strict_types=1);

namespace DoppioGancio\Jira\Domain;

use DateTime;
use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\Type;

class ReleaseResult
{
    private string $self;
    private string $id;
    private string $name;
    private bool $archived;
    private bool $released;

    /**
     * @Type ("DateTime<'Y-m-d'>")
     * @Serializer\SerializedName("releaseDate")
     */
    private ?DateTime $releaseDate = null;

    /** @Serializer\SerializedName("userReleaseDate") */
    private ?string $userReleaseDate = null;

    /** @Serializer\SerializedName("projectId") */
    private int $projectId = 0;

    public function getSelf(): string
    {
        return $this->self;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function isArchived(): bool
    {
        return $this->archived;
    }

    public function isReleased(): bool
    {
        return $this->released;
    }

    public function getReleaseDate(): ?DateTime
    {
        return $this->releaseDate;
    }

    public function getUserReleaseDate(): ?string
    {
        return $this->userReleaseDate;
    }

    public function getProjectId(): int
    {
        return $this->projectId;
    }
}
