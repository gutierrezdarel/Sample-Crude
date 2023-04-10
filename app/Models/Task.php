<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // protected $fillable = ['task_name'];
    protected $guarded = [];

    public function saveTask($data){
        return $this->create($data);
    }
    public function getTaskList(){
        return $this->all();
    }
    public function deleteTask($id){
        $task = $this->find($id);
        $task->delete();
    }
    public function updateTask($data ,$id){
        // var_dump($id);
        $task = $this->find($id);
        $task->update($data);

    }
}
