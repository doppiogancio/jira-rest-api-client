<?php

declare(strict_types=1);

namespace DoppioGancio\Jira\Resource;

use JMS\Serializer\Annotation as Serializer;

class IssueFields
{
    private string $summary;

    /** @Serializer\SerializedName("issuetype") */
    private IssueType $issueType;

    public function getSummary(): string
    {
        return $this->summary;
    }

    public function setSummary(string $summary): void
    {
        $this->summary = $summary;
    }

    public function getIssueType(): IssueType
    {
        return $this->issueType;
    }

    public function setIssueType(IssueType $issueType): void
    {
        $this->issueType = $issueType;
    }
}
