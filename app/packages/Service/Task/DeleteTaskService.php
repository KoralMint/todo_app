<?php

namespace Packages\Service\Task;

use Packages\Repository\TaskRepositoryInterface;
use Packages\Domain\Task\Entity\Task;
use Packages\Domain\Task\ValueObject\TaskId;

class DeleteTaskService
{
    private TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function execute(TaskId $taskId): Task
    {
        $task = $this->taskRepository->selectTask($taskId);
        return $this->taskRepository->deleteTask($task);
    }
}