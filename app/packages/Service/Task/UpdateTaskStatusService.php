<?php

namespace Packages\Service\Task;

use Packages\Repository\TaskRepositoryInterface;
use Packages\Domain\Task\Entity\Task;
use Packages\Domain\Task\ValueObject\Status;

// only 
class UpdateTaskStatusService
{
    private TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function execute(Task $task, Status $status): Task
    {
        $updatedTask = $task->setStatus($status);
        return $this->taskRepository->updateTask($updatedTask);
    }
}