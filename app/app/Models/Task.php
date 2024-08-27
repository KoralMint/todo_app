<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Packages\Domain\Task\Entity\Task as TaskEntity;
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

class Task extends Model
{
    use HasFactory;
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';
    public $incrementing = false;
    protected $keyType = 'string';

    public $fillable = [
        'taskId',
        'title',
        'content',
        'status',
        'position',
        'tags',
        'priority',
        'createdAt',
        'updatedAt',
        'completedAt',
        'deadline',
    ];

    public function toEntity(): TaskEntity
    {
        return TaskEntity::create(
            TaskId::create($this->taskId),
            Title::create($this->title),
            Content::create($this->content),
            Status::create($this->status),
            Position::create($this->position),
            Tags::create($this->tags),
            Priority::create($this->priority),
            CreatedAt::create($this->createdAt),
            UpdatedAt::create($this->updatedAt),
            CompletedAt::create($this->completedAt),
            Deadline::create($this->deadline),
        );
    }

    public function createByEntity(TaskEntity $taskEntity){
        $this::create([
            'taskId' => $taskEntity->getId()->getValue(),
            'title' => $taskEntity->getTitle()->getValue(),
            'content' => $taskEntity->getContent()->getValue(),
            'status' => $taskEntity->getStatus()->value,
            'position' => $taskEntity->getPosition()->getValue(),
            'tags' => $taskEntity->getTags()->getValue(),
            'priority' => $taskEntity->getPriority()->getValue(),
            'createdAt' => $taskEntity->getCreatedAt()->getValue(),
            'updatedAt' => $taskEntity->getUpdatedAt()->getValue(),
            'completedAt' => $taskEntity->getCompletedAt()->getValue(),
            'deadline' => $taskEntity->getDeadline()->getValue(),
        ]);
    }
}
