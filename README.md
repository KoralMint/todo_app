# todo_app

php laravel

## commands

` php artisan make:model {model name} -m `

## directory structure



- packages
  - Domain
    - Task
      - Entity
        - `Task.php`
      - ValueObject
        - `ID.php` // uuid
        - `Title.php`
        - `Content.php`
        - `Tag.php`
        - `Status.php`
        - `Priority.php`
        - `Deadline.php` // date +? time
    - Search
      - Entity
        - `Search.php`
      - ValueObject
        - `Word.php`
        - `Words.php`
  - Exception
    - `ValueException.php`
  - Repository
    - `TaskRepository.php`
    - `TaskRepositoryInterface.php`
  - Service
    - Task
      - `CreateTaskService.php`
      - `UpdateTaskStatusService.php`
      - `UpdateTaskInfoService.php`
      - `DeleteTaskService.php`
      - `GetTaskService.php`
    - Repository
      - `GetTasksService.php`
      - `ChangeOrderService.php` // complete | incomplete
      - `SortOrderService.php`