<?php

namespace Packages\Service\Task;

use Packages\Repository\TaskRepositoryInterface;
use Packages\Domain\Search\Entity\Search;
use Illuminate\Support\Collection;

class GetTasksService
{
    private TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function execute(Search $searchEntity): Collection
    {
        return $this->taskRepository->selectTasks($searchEntity);
    }
}