<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function home(){

        //$tasks = Task::where('visible', 1)->get();

        $tasks = Task::orderBy('created_at', 'desc')->
            where('visible', 1)->get();

        return view('home', [
            "tasks"=>$tasks
        ]);
    }

    public function newTask(){
        return view('new-task');
    }

    public function newTaskSubmit(Request $request){

        // pega os dados do request
        $newTask = $request->input('new-task');
        
        // Salva os dado do banco de dados
        $task = new Task();
        $task->task = $newTask;
        $task->save();
        
        // Retorna para a home 
        return redirect()->route('home');

    }

    public function taskDone($id){

        // pega o id por GET e atualiza a conclusão da tarefa
        $task = Task::find($id);
        $task->done = new \DateTime();
        $task->save();

        return redirect()->route('home');

    }

    public function taskUndone($id){

        // pega o id por GET e atualiza a conclusão da tarefa
        $task = Task::find($id);
        $task->done = null;
        $task->save();
        
        return redirect()->route('home');

    }

    public function editTask($id){

        // retorna página para editar uma tarefa 
        $task = Task::find($id);

        return view('edit-task', [
            "task"=>$task
        ]);

    }

    public function editTaskSubmit(Request $request){

        // pega os dados do request
        $task = Task::find($request->input('id'));
        $task->task = $request->input('task-edited');

        // Salva os dado do banco de dados
        $task->save();
        
        // Retorna para a home 
        return redirect()->route('home');

    }

    public function showInvisibleTasks(){

        $tasks = Task::orderBy('created_at', 'desc')->
            where('visible', 0)->get();

        return view('hidden-tasks', [
            "tasks"=>$tasks
        ]);

    }

    public function changeTaskVisibility($id){

        $task = Task::find($id);
        $route = '';

        if($task->visible === 1){
            $task->visible = 0;
            $route = 'home';
        } else {
            $task->visible = 1;
            $route = 'hidden-tasks';
        }
        
        $task->save();
        return redirect()->route($route);
    }

    public function deleteTask($id){

        $task = Task::find($id);

        $task->delete();

        return redirect()->route('home');

    }

}
