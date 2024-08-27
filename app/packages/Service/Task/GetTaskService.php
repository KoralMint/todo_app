<?php

namespace Packages\Service\Task;

use Packages\Repository\TaskRepositoryInterface;
use Packages\Domain\Task\Entity\Task;
use Packages\Domain\Task\ValueObject\TaskId;

class GetTaskService
{
    private TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function execute(TaskId $taskId): Task
    {
        return $this->taskRepository->selectTask($taskId);
    }
}