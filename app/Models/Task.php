<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function task()
    {
        return $this->hasMany(Task::class, 'task_id', 'id');
    }

    public function getAllTasks()
    {
        return $this->all();
    }

    public function addTask(array $attribute)
    {
        return $this->create($attribute);
    }

    public function update($id, array $attribute)
    {
        $task = $this->find($id);
        if($task) {
            $task->update($attribute);
            return $task;
        }
        return false;
    }

    public function deleteTasks($id)
    {
        $task = $this->find($id);
        if ($task) {
            $task->destroy($id);
            return true;
        }
        return false;
    }

}
