<?php

declare(strict_types=1);

namespace DoppioGancio\Jira\Resource;

class Issue
{
    private string $expand;
    private string $id;
    private string $self;
    private string $key;

    private ?IssueFields $fields;

    public function getExpand(): string
    {
        return $this->expand;
    }

    public function setExpand(string $expand): void
    {
        $this->expand = $expand;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getSelf(): string
    {
        return $this->self;
    }

    public function setSelf(string $self): void
    {
        $this->self = $self;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key): void
    {
        $this->key = $key;
    }

    public function getFields(): ?IssueFields
    {
        return $this->fields;
    }

    public function setFields(?IssueFields $fields): void
    {
        $this->fields = $fields;
    }
}
