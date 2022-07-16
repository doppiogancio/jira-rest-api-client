<?php

declare(strict_types=1);

namespace DoppioGancio\Jira\Domain;

class Operation
{
    private string $id;
    private string $styleClass;
    private string $label;
    private string $href;
    private int $weight;

    public function getId(): string
    {
        return $this->id;
    }

    public function getStyleClass(): string
    {
        return $this->styleClass;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getHref(): string
    {
        return $this->href;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }
}
