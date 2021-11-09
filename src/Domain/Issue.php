<?php

declare(strict_types=1);

namespace DoppioGancio\Jira\Domain;

class Issue
{
    private string $expand;
    private string $id;
    private string $self;
    private string $key;

    public function getExpand(): string
    {
        return $this->expand;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getSelf(): string
    {
        return $this->self;
    }

    public function getKey(): string
    {
        return $this->key;
    }
}
