@extends('layouts.main_layout')

@section('content')

  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <h3 class="text-center">TODO List</h3>
        <hr>

        <div class="my-2">
          <a href="{{route('new_task')}}" class="btn btn-primary">Create Task</a>
        </div>

        <div class="my-2">
          <a href="{{route('hidden-tasks')}}" class="btn btn-primary">Show Hidden Tasks</a>
        </div>

        <hr>

        @if($tasks->count() === 0)
          <p>Não existem tarefas registradas</p>
        @else 
          <table class="table table-striped">
            <thead class="table-dark">
              <tr>
                <th>Tarefa</th>
                <th>Ações</th>
              </tr>
            </thead>

            <tbody>
              @foreach($tasks as $task)
                <tr>
                  <td style="width: 70%">{{ $task->task }}</td>
                  <td>

                    @if($task->done == null)
                      <a href="{{ route('task-done', ['id'=>$task->id]) }}" class="btn btn-sm btn-success">
                        <i class="fa fa-check"></i>
                      </a>
                    @else
                      <a href="{{ route('task-undone', ['id'=>$task->id]) }}" class="btn btn-sm btn-warning">
                        <i class="fa fa-times"></i>
                      </a>  
                    @endif
                    
                    <a href="{{ route('edit-task', ['id'=>$task->id]) }}" class="btn btn-sm btn-primary">
                      <i class="fas fa-pencil-alt"></i>
                    </a>

                    @if($task->visible === 1)
                      <a href="{{ route('task-visibility', ['id' => $task->id]) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-eye-slash"></i>
                      </a>
                    @else
                      <a href="{{ route('task-visibility', ['id' => $task->id]) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-eye"></i>
                      </a>
                    @endif

                    <a href="{{ route('delete-task', ['id'=>$task->id]) }}" class="btn btn-sm btn-danger">
                      <i class="fas fa-trash-alt"></i>
                    </a>

                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>

          <hr>
          <div>
            <p>Total: <strong>{{ $tasks->count() }}</strong></p>
          </div>

        @endif

      </div>
    </div>
  </div>

@endsection