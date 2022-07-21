<?php

declare(strict_types=1);

namespace DoppioGancio\Jira\Resource;

use JMS\Serializer\Annotation as Serializer;

class IssuesStatusForFixVersion
{
    private int $unmapped;

    /** @Serializer\SerializedName("toDo") */
    private int $toDo;

    /** @Serializer\SerializedName("inProgress") */
    private int $inProgress;

    private int $done;

    public function getUnmapped(): int
    {
        return $this->unmapped;
    }

    public function setUnmapped(int $unmapped): void
    {
        $this->unmapped = $unmapped;
    }

    public function getToDo(): int
    {
        return $this->toDo;
    }

    public function setToDo(int $toDo): void
    {
        $this->toDo = $toDo;
    }

    public function getInProgress(): int
    {
        return $this->inProgress;
    }

    public function setInProgress(int $inProgress): void
    {
        $this->inProgress = $inProgress;
    }

    public function getDone(): int
    {
        return $this->done;
    }

    public function setDone(int $done): void
    {
        $this->done = $done;
    }
}
