<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $fillable = ['user_id', 'name', 'description', 'created_at', 'updated_at'];
    protected const RETURN_NUM_ZERO = 0;
    protected const RETURN_NUM_ONE = 1;
    protected const RETURN_STR_ZERO = "0";
    protected const RETURN_STR_ONE = "1";

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

    public function getAllTasks()
    {
        return $this->all();
    }

    public function getTaskById($id)
    {
        return $this->find($id);
    }

    public function updateTasks($request, $id)
    {
        $idTasks = $this->find($id);
        $idTasks->user_id = $request->userId;
        $idTasks->name = $request->name;
        $idTasks->description = $request->description;
        $idTasks->updated_at = Carbon::now();
        if(! $idTasks->save()) {
            return self::RETURN_STR_ZERO;
        }
        return $idTasks;
    }

}
