<?php

namespace DoppioGancio\Jira\Domain;

class Operation
{
    private string $id;
    private string $styleClass;
    private string $label;
    private string $href;
    private int $weight;

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
    public function getStyleClass(): string
    {
        return $this->styleClass;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getHref(): string
    {
        return $this->href;
    }

    /**
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }
}