# todo_app

php laravel

## commands

` php artisan make:model {model name} -m ` -m: generate migration file

## directory structure
- app
  - app
    - Http
      - Controller // get `model` Request, returns `view`
        - `TaskController.php`
      - Request
        - `ShowTasksRequest.php`
        - `CreateTaskRequest.php`
        - `UpdateTaskRequest.php` // ( UpdateTaskStatus | UpdateTaskGeneral ) Branched by parameters
        - `DeleteTaskRequest.php`
    - Models
      - `Task.php`
    - Providers
      - `DIProvider.php`

  - packages
    - Domain
      - Task
        - Entity
          - `Task.php`
        - ValueObject
          - `TaskId.php`
          - `Title.php`
          - `Content.php`
          - `Status.php`
          - `Position.php`
          - `Tags.php` // array(Tag)
          - `Priority.php` // 0,1,2 | low, medium, high
          - `CreatedAt.php`
          - `UpdatedAt.php`
          - `CompletedAt.php`
          - `Deadline.php` // date +? time
      - Tag
        - Entity
          - `Tag.php`
        - ValueObject
          - `TagId.php`
          - `TagName.php`
      - Search //// low priority
        - Entity
          - `Search.php`
        - ValueObject
          - `Sortable.php` // enum?array
          - `Filterable.php` // set
    - Exception
      - `ValueException.php`
    - Repository
      - `TaskRepository.php`
      - `TaskRepositoryInterface.php`
      - `TagRepository.php`
      - `TagRepositoryInterface.php`
    - Service
      - Task
        - `CreateTaskService.php`
        - `UpdateTaskStatusService.php` // complete | incomplete
        - `UpdateTaskGeneralService.php` // title, content, tag, deadline
        - `DeleteTaskService.php`
        - `GetTaskService.php`
        - `GetTasksService.php` // all
        - `ChangeTaskPositionService.php` // for user-adjust
        - `SortTasksService.php` // by deadline, createdAt, tag, title, priority, etc..
      - Tag
        - `CreateTagService.php`
        - `RenameTagService.php`
        - `DeleteTagService.php`
        - `GetTagService.php`
        - `GetTagsService.php`
  - routes
    - `web.app` // -> controller with request