<?php

namespace Packages\Repository;

use Packages\Domain\Task\Entity\Task;
use Packages\Domain\Task\ValueObject\TaskId;
use Packages\Domain\Search\Entity\Search;
use Illuminate\Support\Collection;

interface TaskRepositoryInterface
{
    public function createTask(Task $task): Task;
    public function updateTask(Task $task): Task;
    public function deleteTask(Task $task): Task;
    public function selectTask(TaskId $taskId): Task;
    public function selectTasks(Search $searchEntity): Collection;
    public function sortTasks(string $sortBy): Collection;
}