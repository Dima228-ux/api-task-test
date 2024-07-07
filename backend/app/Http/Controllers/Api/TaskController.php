<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\SearchTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Services\TaskService\TaskDTO;
use App\Services\TaskService\TaskService;

class TaskController extends Controller
{
    public function __construct(
        protected TaskService $taskService
    ) {
    }

    public function createTask(CreateTaskRequest $request)
    {
        $task = $this->taskService->createTask(TaskDTO::fromRequest($request));
        return response()->json(['task' => TaskResource::make($task)]);
    }

    public function updateTask(UpdateTaskRequest $request)
    {
        if ($task = Task::find($request->id)) {
            $this->taskService->updateTask($task, TaskDTO::fromRequest($request));
            return response()->json(['task' => TaskResource::make($task)]);
        }
        return response()->json(['error' => 'Task Not found'], 404);
    }

    public function deleteTask($id)
    {
        if (!is_numeric($id)) {
            return response()->json(['error' => 'Error parameters'], 400);
        }
        if ($task = Task::find($id)) {
            $status = $this->taskService->deleteTask($task) ? 'success' : 'error';
            return response()->json(['status' => $status]);
        }
        return response()->json(['error' => 'Task Not found'], 404);
    }

    public function searchTask(SearchTaskRequest $request)
    {
        $tasks = $this->taskService->searchTask($request->get('status'), $request->get('date_expiration'));
        return response()->json(
            [
                'success' => true,
                'data' => TaskResource::collection($tasks),
            ]
        );
    }

    public function getTasks()
    {
        return response()->json(
            [
                'success' => true,
                'data' => TaskResource::collection(Task::all())
            ]
        );
    }
}
