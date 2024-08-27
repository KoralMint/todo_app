<?php

namespace Packages\Service\Task;

use Packages\Repository\TaskRepositoryInterface;
use Packages\Domain\Search\Entity\Search;
use Packages\Domain\Task\Entity\Task;

class SortTasksService
{
    private TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function execute(string $sortBy): void
    {
        $this->taskRepository->sortTasks($sortBy);
    }
}