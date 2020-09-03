<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\User;
use Carbon\Carbon;

class TaskController extends Controller
{
    protected $users;
    protected $tasks;

    public function __construct(User $_users = null, Task $_tasks = null)
    {
        $this->users = $_users;
        $this->tasks = $_tasks;
    }

    public function create()
    {
        $list_users = $this->users->getAllUser();
        return view('tasks.add_task', [
            'list_users' => $list_users
        ]);
    }

    public function store(TaskRequest $request)
    {
        $data = $request->all();
        $data->user_id = $request->user_id;
        $data->name = $request->name;
        $data->description = $request->description;
        $newTask = $this->tasks->addTask($data);
        if ($newTask) {
            return redirect('tasks/add_task')->with([
                trans('messages.add_message.messageSuccess'),
                trans('messages.add_message.classSuccess'),
            ]);
        }
        return redirect('tasks/list_task')->with([
            trans('messages.add_message.messageFail'),
            trans('messages.add_message.classFail')
        ]);
    }

    public function index()
    {
        $list_tasks = $this->tasks->getAllTasks();
        return view('tasks.list_task', [
            'list_tasks' => $list_tasks
        ], compact('list_tasks'));
    }

    public function edit($id)
    {
        $task = $this->tasks->find($id);
        $list_users = $this->users->getAllUser();
        if ($task) {
            return view('tasks.edit_task', [
                'idTasks' => $task,
                'list_users' => $list_users
            ], compact('idTasks'));
        } else
            return redirect()->back();
    }

    public function update($id,TaskRequest $request)
    {
        $data = $request->all();
        $data->user_id = $request->user_id;
        $data->name = $request->name;
        $data->description = $request->description;
        $task = $this->tasks->update($id, $data);
        if ($task) {
            return redirect('tasks/list_task', [
                trans('messages.edit_form.messageSuccess'),
                trans('messages.edit_form.classSuccess'),
            ], compact('idTasks'));
        } else {
            return redirect()->back()->with([
                trans('messages.edit_form.messageFail'),
                trans('messages.edit_form.classError'),
            ]);
        }
    }

    public function destroy($id)
    {
        $deleteResult = $this->tasks->deleteTasks($id);
        if ($deleteResult) {
            return redirect('tasks/list_task')->with([
                trans('messages.delete_message.messageSuccess'),
                trans('messages.delete_message.classSuccess')
            ]);
        }
        return redirect()->back()->with([
            trans('messages.delete_message.messageFail'),
            trans('messages.delete_message.classFail')
        ]);
    }

}
