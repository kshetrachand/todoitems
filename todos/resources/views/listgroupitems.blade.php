@extends('layouts.main')
@push('head')
<title>Swansea Uni Library Students -Todo List Home Page</title>
<style>
    .just-padding {
  padding: 15px;
}

.list-group.list-group-root {
  padding: 0;
  overflow: hidden;
}

.list-group.list-group-root .list-group {
  margin-bottom: 0;
}

.list-group.list-group-root .list-group-item {
  border-radius: 0;
  border-width: 1px 0 0 0;
}

.list-group.list-group-root > .list-group-item:first-child {
  border-top-width: 0;
}

.list-group.list-group-root > .list-group > .list-group-item {
  padding-left: 30px;
}

.list-group.list-group-root > .list-group > .list-group > .list-group-item {
  padding-left: 45px;
}
    </style>
@endpush
@section('main-section')
<div class="container">
<div class="d-flex justify-content-between align-items-center my-5">
<div class="h2">Group Todos</div>
<a href="{{route('todo.home')}}" class="btn btn-primary btn-lg">List  Todo</a>
<a href="{{route('todo.create')}}" class="btn btn-primary btn-lg">Create Todo</a>



</div>

@foreach ($group as $todo)
<div class="just-padding">

<div class="list-group list-group-root well">
  
  <a style=" color:white;background:black; font-size:18px;" href="#" class="list-group-item">{{$todo->group_name}}</a>

    
   
    <div class="list-group">
    @foreach($todo->grouptask as $task)
    @php

    @endphp
      <a href="#" class="list-group-item">name: {{@$task->todo->name}} Work: {{@$task->todo->work}} Due Date: {{@$task->todo->work}}</a>
      
    
     
   @endforeach
   
</div>
</div>
  </div>
  



@endforeach

</div>






@endsection