@extends('layouts.main')
@push('head')
<title>Swansea Uni Library Students -Todo List Home Page</title>
@endpush
@section('main-section')
<div class="container">
<div class="d-flex justify-content-between align-items-center my-5">
<div class="h2">All Todos</div>
<a href="{{route('todo.listgroupitems')}}" class="btn btn-primary btn-lg">List  Todo Groups</a>
<a href="{{route('todo.create')}}" class="btn btn-primary btn-lg">Create Todo</a>



</div>
<form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('groupitems')}}">
@csrf
 <label> Group Name <input required class="form-input" type="text" name="group" placeholder="Input Group Name"/> <input class="btn btn-primary" type="submit" value="Create Group
">
<div class="row">
</div>
<table class="table table-stripped table-dark">
<tr>
<th>Select</th>
<th>Student Name</th>
<th>Work to be done</th>
<th>Due Date</th>
<th>Work Status</th>
<th colspan=2>Choose Action</th>



</tr>
@foreach ($todos as $todo)

<tr valign='middle'>
    <td><input type="checkbox" name="select[]" value="{{$todo->id}}"></td>
<td>{{$todo->name}}</td>
<td>{{$todo->work}}</td>
<td>{{$todo->dueDate}}</td>
<td><a href="{{route('todo.status')}}?status=@if($todo->status ==1)0 @else 1 @endif&& id={{$todo->id}}" class="btn btn-success btn-sm" style="background:@if($todo->status ==1)green @else red @endif">@if($todo->status ==1)Done @else Pending @endif</a></td>
<td><a href="{{route('todo.edit', $todo->id)}}" class="btn btn-success btn-sm">Update</a></td>
<td><a href="{{route('todo.delete', $todo->id)}}" class="btn btn-danger btn-sm">Delete</a></td>




</tr>

@endforeach

</table>
</form>

</div>



@endsection