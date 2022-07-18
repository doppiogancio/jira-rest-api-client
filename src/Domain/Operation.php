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

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getStyleClass(): string
    {
        return $this->styleClass;
    }

    public function setStyleClass(string $styleClass): void
    {
        $this->styleClass = $styleClass;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    public function getHref(): string
    {
        return $this->href;
    }

    public function setHref(string $href): void
    {
        $this->href = $href;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): void
    {
        $this->weight = $weight;
    }
}
