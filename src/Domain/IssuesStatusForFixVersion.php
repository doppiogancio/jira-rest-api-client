<?php

namespace DoppioGancio\Jira\Domain;

use JMS\Serializer\Annotation as Serializer;

class IssuesStatusForFixVersion
{
    private int $unmapped;

    /** @Serializer\SerializedName("toDo") */
    private int $toDo;

    /** @Serializer\SerializedName("inProgress") */
    private int $inProgress;

    private int $done;

    /**
     * @return int
     */
    public function getUnmapped(): int
    {
        return $this->unmapped;
    }

    /**
     * @return int
     */
    public function getToDo(): int
    {
        return $this->toDo;
    }

    /**
     * @return int
     */
    public function getInProgress(): int
    {
        return $this->inProgress;
    }

    /**
     * @return int
     */
    public function getDone(): int
    {
        return $this->done;
    }
}