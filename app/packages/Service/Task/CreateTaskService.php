<?php

namespace Packages\Service\Task;

use Packages\Repository\TaskRepositoryInterface;
use Packages\Domain\Task\Entity\Task;

class CreateTaskService
{
    private TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function execute(Task $task): Task
    {
        return $this->taskRepository->createTask($task);
    }
}