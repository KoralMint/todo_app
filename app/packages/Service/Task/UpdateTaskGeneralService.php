<?php

namespace Packages\Service\Task;

use Packages\Repository\TaskRepositoryInterface;
use Packages\Domain\Task\Entity\Task;
use Packages\Domain\Task\ValueObject\UpdatedAt;

class UpdateTaskGeneralService
{
    private TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function execute(Task $task): Task
    {
        $task = $task->setUpdatedAt(UpdatedAt::createNow());
        return $this->taskRepository->updateTask($task);
    }
}