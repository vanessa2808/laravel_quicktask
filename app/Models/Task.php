<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $fillable = ['user_id', 'name', 'description', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function task()
    {
        return $this->hasMany('App\Models\Task', 'task_id', 'id');
    }

    public function addTask($request)
    {
        $newTasks = new Task();
        $newTasks->user_id = $request->userId;
        $newTasks->name = $request->name;
        $newTasks->description = $request->desccription;
        $newTasks->created_at = Carbon::now();
        if (!$newTasks->save()) {
            return self::RETURN_STR_ZERO;
        }
        return $newTasks;
    }
}
