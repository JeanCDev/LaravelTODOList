<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Artisan;

// página inicial
Route::get('/', [TaskController::class, 'home'])->name('home');

// pagina para cria e salvar uma nova tarefa
Route::get('/new-task', [TaskController::class, 'newTask'])->name('new_task');
Route::post('/new-task-submit', [TaskController::class, 'newTaskSubmit'])->name('new-task-submit');

// edita uma tarefa
Route::get('/edit-task/{id}', [TaskController::class, 'editTask'])->name('edit-task');
Route::post('/edit-task-submit', [TaskController::class, 'editTaskSubmit'])->name('edit-task-submit');

// trocar a tarefa para concluída/não concluída
Route::get('/task-done/{id}', [TaskController::class, 'taskDone'])->name('task-done');
Route::get('/task-undone/{id}', [TaskController::class, 'taskUndone'])->name('task-undone');

// Muda a visibilidade das tarefas
Route::get('/hidden-tasks', [TaskController::class, 'showInvisibleTasks'])->name('hidden-tasks');
Route::get('/task-visibility/{id}', [TaskController::class, 'changeTaskVisibility'])->name('task-visibility');

// Apaga a task - com soft delete
Route::get('/delete-task/{id}', [TaskController::class, 'deleteTask'])->name('delete-task');

Artisan::call('migrate');
