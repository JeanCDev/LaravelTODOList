@extends('layouts.main_layout')

@section('content')
    
  <h3 class="text-center">Todo List</h3>
  <hr>

  <h3 class="text-center mb-5">New Task</h3>

  <form action="{{@route('new-task-submit')}}" method="post">
    @csrf
    <div class="row">
      <div class="col-sm-4 offset-sm-4">
        <div class="form-group">
          <label for="new-task">Task name</label>
          <input 
            type="text" 
            name="new-task" 
            id="new-task" 
            placeholder="New task"
            class="form-control">
        </div>
        
        <div class="form-group mt-3 d-flex justify-content-center">
          <a href="{{@route('home')}}" class="btn btn-secondary ">Cancel</a>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </div>

      </div>
    </div>

  </form>

@endsection