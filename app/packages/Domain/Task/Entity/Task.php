<?php

namespace Packages\Domain\Task\Entity;

use Packages\Domain\Task\ValueObject\TaskId;
use Packages\Domain\Task\ValueObject\Title;
use Packages\Domain\Task\ValueObject\Content;
use Packages\Domain\Task\ValueObject\Status;
use Packages\Domain\Task\ValueObject\Position;
use Packages\Domain\Task\ValueObject\Tags;
use Packages\Domain\Task\ValueObject\Priority;
use Packages\Domain\Task\ValueObject\CreatedAt;
use Packages\Domain\Task\ValueObject\UpdatedAt;
use Packages\Domain\Task\ValueObject\CompletedAt;
use Packages\Domain\Task\ValueObject\Deadline;

class Task {
    private TaskId $id;
    private Title $title;
    private Content $content;
    private Status $status;
    private Position $position;
    private Tags $tags;
    private Priority $priority;
    private CreatedAt $createdAt;
    private UpdatedAt $updatedAt;
    private CompletedAt $completedAt;
    private Deadline $deadline;

    private function __construct(
        TaskId $id,
        Title $title,
        Content $content,
        Status $status,
        Position $position,
        Tags $tags,
        Priority $priority,
        CreatedAt $createdAt,
        UpdatedAt $updatedAt,
        CompletedAt $completedAt,
        Deadline $deadline
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->status = $status;
        $this->position = $position;
        $this->tags = $tags;
        $this->priority = $priority;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->completedAt = $completedAt;
        $this->deadline = $deadline;
    }

    // get
    public function getId(): TaskId
    {
        return $this->id;
    }
    public function getTitle(): Title { return $this->title; }
    public function getContent(): Content { return $this->content; }
    public function getStatus(): Status { return $this->status; }
    public function getPosition(): Position { return $this->position; }
    public function getTags(): Tags { return $this->tags; }
    public function getPriority(): Priority { return $this->priority; }
    public function getCreatedAt(): CreatedAt { return $this->createdAt; }
    public function getUpdatedAt(): UpdatedAt { return $this->updatedAt; }
    public function getCompletedAt(): CompletedAt { return $this->completedAt; }
    public function getDeadline(): Deadline { return $this->deadline; }

    // set
    public function setStatus(Status $status): Task
    {
        $cloned = clone $this;
        $cloned->status = $status;
        
        return $cloned;
    }

    public static function create(
        TaskId $id,
        Title $title,
        Content $content,
        Status $status,
        Position $position,
        Tags $tags,
        Priority $priority,
        CreatedAt $createdAt,
        UpdatedAt $updatedAt,
        CompletedAt $completedAt,
        Deadline $deadline
    ): self {
        return new self(
            $id,
            $title,
            $content,
            $status,
            $position,
            $tags,
            $priority,
            $createdAt,
            $updatedAt,
            $completedAt,
            $deadline
        );
    }
}