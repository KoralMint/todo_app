<?php

namespace App\Http\Controllers;

use Packages\Service\Task\GetTasksService;
use Packages\Service\Task\CreateTaskService;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    private GetTasksService $getTasksService;

    public function __construct(
        GetTasksService $getTasksService
    ){
        $this->getTasksService = $getTasksService;
    }
}
