<?php


namespace App\Services\TaskService;


use App\Models\Task;

class TaskService
{
    public function createTask(TaskDTO $taskData): Task
    {
        return Task::create($taskData->toArray());
    }

    public function updateTask(Task $task, TaskDTO $taskData)
    {
        $task->update($taskData->toArray());
    }

    public function deleteTask(Task $task)
    {
        return $task->delete();
    }

    public function searchTask($status, $date_expiration)
    {
        return Task::where('status', $status)->where('date_expiration', $date_expiration)->get();
    }
}
