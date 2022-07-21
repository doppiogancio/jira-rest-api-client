<?php

declare(strict_types=1);

namespace DoppioGancio\Jira\Resource;

use JMS\Serializer\Annotation as Serializer;

class IssueType
{
    private string $self;
    private int $id;
    private string $description;

    /** @Serializer\SerializedName("iconUrl") */
    private string $iconUrl;
    private string $name;
    private bool $subtask;

    /** @Serializer\SerializedName("avatarId") */
    private int $avatarId;

    /** @Serializer\SerializedName("hierarchyLevel") */
    private int $hierarchyLevel;

    public function getSelf(): string
    {
        return $this->self;
    }

    public function setSelf(string $self): void
    {
        $this->self = $self;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getIconUrl(): string
    {
        return $this->iconUrl;
    }

    public function setIconUrl(string $iconUrl): void
    {
        $this->iconUrl = $iconUrl;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function isSubtask(): bool
    {
        return $this->subtask;
    }

    public function setSubtask(bool $subtask): void
    {
        $this->subtask = $subtask;
    }

    public function getAvatarId(): int
    {
        return $this->avatarId;
    }

    public function setAvatarId(int $avatarId): void
    {
        $this->avatarId = $avatarId;
    }

    public function getHierarchyLevel(): int
    {
        return $this->hierarchyLevel;
    }

    public function setHierarchyLevel(int $hierarchyLevel): void
    {
        $this->hierarchyLevel = $hierarchyLevel;
    }
}
