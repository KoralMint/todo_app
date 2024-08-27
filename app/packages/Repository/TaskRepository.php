<?php

namespace Packages\Repository;

use App\Models\Task as TaskModel;
use Packages\Domain\Task\Entity\Task;
use Packages\Domain\Task\ValueObject\TaskId;
use Packages\Domain\Search\Entity\Search;
use Illuminate\Support\Collection;

class TaskRepository {
    public function createTask(Task $task): void
    {
        $taskModel = new TaskModel();
        $taskModel->id = $task->getId()->getValue();
        $taskModel->title = $task->getTitle()->getValue();
        $taskModel->content = $task->getContent()->getValue();
        $taskModel->tags = $task->getTags()->getValue();
        $taskModel->save();
    }

    public function updateTask(Task $task): void
    {
        $taskModel = TaskModel::find($task->getId()->getValue());
        $taskModel->update([
            'title' => $task->getTitle()->getValue(),
            'content' => $task->getContent()->getValue(),
            'status' => $task->getStatus()->value,
            'tags' => $task->getTags()->getValue(),
            'position' => $task->getPosition()->getValue(),
            'priority' => $task->getPriority()->getValue(),
            'updated_at' => $task->getUpdatedAt()->getValue()
        ]);
    }

    public function deleteTask(Task $task): void
    {
        $taskModel = TaskModel::find($task->getId()->getValue());
        $taskModel->delete();
    }

    public function selectTask(TaskId $taskId): Task
    {
        $taskModel = TaskModel::find($taskId->getValue());
        return $taskModel->toEntity();
    }

    public function selectTasks(Search $searchEntity): Collection
    {
        $query = TaskModel::query();
        if ($searchEntity->getWords()->isExists()) {
            $query = $query->whereIn('title', $searchEntity->getWords()->getValue());
        }

        return $query->get()->map(function ($taskModel) {
            return $taskModel->toEntity();
        });
    }

    public function sortTasks(string $sortBy): Collection
    {
        $query = TaskModel::query();
        return $query->orderBy($sortBy)->get()->map(function ($taskModel) {
            return $taskModel->toEntity();
        });
    }     
}