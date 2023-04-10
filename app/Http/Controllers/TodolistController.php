<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TodolistController extends Controller
{
    public $task;

    function __construct()
    {
        $this->task = new Task;
    }
    
    function index(){
      $tasks = $this->task->getTaskList();
        return view('index', compact('tasks'));
    }


    function saveTask(Request  $Request){
        $data = [ 'task_name' =>  $Request->taskname];

        $this->task-> saveTask($data);
        return back();
    }
    function deleteTask($id){
        $this->task->deleteTask($id);
        return back();
    }
    function updateTask(Request $Request) {
        
        $data = [ 'task_name' =>  $Request->UpdateTask];  
        $this->task->updateTask($data , $Request->updateTask_id);
        return back();

        // var_dump($Request->updateTask_id);
    }
}
