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
     * @var DateTime|null
     */
    private ?DateTime $releaseDate = null;

    /**
     * @Serializer\SerializedName("userReleaseDate")
     * @var string|null
     */
    private ?string $userReleaseDate = null;

    /**
     * @Serializer\SerializedName("projectId")
     * @var int
     */
    private int $projectId = 0;

    /**
     * @return string
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function isArchived(): bool
    {
        return $this->archived;
    }

    /**
     * @return bool
     */
    public function isReleased(): bool
    {
        return $this->released;
    }

    /**
     * @return DateTime|null
     */
    public function getReleaseDate(): ?DateTime
    {
        return $this->releaseDate;
    }

    /**
     * @return string|null
     */
    public function getUserReleaseDate(): ?string
    {
        return $this->userReleaseDate;
    }

    /**
     * @return int
     */
    public function getProjectId(): int
    {
        return $this->projectId;
    }
}
