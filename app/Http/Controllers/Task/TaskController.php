<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\User;

class TaskController extends Controller
{
    protected $users;
    protected $tasks;

    public function __construct(User $_users = null, Task $_tasks = null)
    {
        $this->users = $_users;
        $this->tasks = $_tasks;
    }

    public function getAddTasks()
    {
        $list_users = $this->users->getAllUser();
        return view('tasks.add_task', [
            'list_users' => $list_users
        ]);
    }

    public function postAddTasks(TaskRequest $request)
    {
        $newTasks = $this->tasks->addTask($request);
        if ($newTasks == self::RETURN_STR_ZERO) {
            return redirect('tasks/add_task')->with([
                'message' => 'error action',
                'class' => 'error'
            ]);
        }
        return redirect('tasks/list_task')->with([
            'message' => 'add successfully',
            'class' => 'success'
        ]);
    }

    public function index()
    {
        $list_tasks = $this->tasks->getAllTasks();
        return view('tasks.list_task',[
           'list_tasks' => $list_tasks
        ], compact('list_tasks'));
    }

}
