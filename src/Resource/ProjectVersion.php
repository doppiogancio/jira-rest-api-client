<?php

declare(strict_types=1);

namespace DoppioGancio\Jira\Resource;

use DateTime;
use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\Type;

class ProjectVersion
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

    /** @Serializer\SerializedName("issuesStatusForFixVersion") */
    private ?IssuesStatusForFixVersion $issuesStatusForFixVersion = null;

    /**
     * @Type("array<int,DoppioGancio\Jira\Resource\Operation>")
     * @var Operation[]
     */
    private array $operations = [];

    public function getSelf(): string
    {
        return $this->self;
    }

    public function setSelf(string $self): void
    {
        $this->self = $self;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function isArchived(): bool
    {
        return $this->archived;
    }

    public function setArchived(bool $archived): void
    {
        $this->archived = $archived;
    }

    public function isReleased(): bool
    {
        return $this->released;
    }

    public function setReleased(bool $released): void
    {
        $this->released = $released;
    }

    public function getReleaseDate(): ?DateTime
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(?DateTime $releaseDate): void
    {
        $this->releaseDate = $releaseDate;
    }

    public function getUserReleaseDate(): ?string
    {
        return $this->userReleaseDate;
    }

    public function setUserReleaseDate(?string $userReleaseDate): void
    {
        $this->userReleaseDate = $userReleaseDate;
    }

    public function getProjectId(): int
    {
        return $this->projectId;
    }

    public function setProjectId(int $projectId): void
    {
        $this->projectId = $projectId;
    }

    public function getIssuesStatusForFixVersion(): ?IssuesStatusForFixVersion
    {
        return $this->issuesStatusForFixVersion;
    }

    public function setIssuesStatusForFixVersion(?IssuesStatusForFixVersion $issuesStatusForFixVersion): void
    {
        $this->issuesStatusForFixVersion = $issuesStatusForFixVersion;
    }

    /**
     * @return Operation[]
     */
    public function getOperations(): array
    {
        return $this->operations;
    }

    /**
     * @param Operation[] $operations
     */
    public function setOperations(array $operations): void
    {
        $this->operations = $operations;
    }
}
