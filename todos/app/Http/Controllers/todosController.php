<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\todos;
use  App\Models\Group;
use  App\Models\Grouptask;

class todosController extends Controller
{
    public function index(){
        $todos=todos::all();
        $data=compact('todos');
        return view("welcome")->with($data);
    }
    public function store(Request $request) {
$request->validate(
    [
        'name'=>'required',
        'work'=>'required',
        'dueDate'=>'required'   
    ]
    );
   $todo=new todos;
   $todo->name=$request['name'];
   $todo->work=$request['work'];
   $todo->dueDate=$request['dueDate'];
   $todo->save();

   return redirect(route("todo.home"));

    }
    public function delete($id){
todos::find($id)->delete();
return redirect(route("todo.home"));

    }
public function edit($id){
$todo=todos::find($id);
$data=compact('todo');
return view("update")->with($data);


}
    
public function updateData(Request $request){
    $request->validate(
        [
            'name'=>'required',
            'work'=>'required',
            'dueDate'=>'required'   
        ]
        );
        $id=$request['id'];
       $todo=todos::find($id);
       $todo->name=$request['name'];
       $todo->work=$request['work'];
       $todo->dueDate=$request['dueDate'];
       $todo->save();
    
       return redirect(route("todo.home"));

}
public function groupitems(Request $request){
    $request->validate(
        [
            'name'=>'group_name',
            
        ]
        );
    $group = new group();
    $group->group_name=$request->group;
    $group->save();
if(isset($request->select) && count($request->select)>0){
    for($i=0; $i<count($request->select); $i++){

        $task = new Grouptask();
    $task->group_id        = $group->id;
    $task->todo_id      = $request->select[$i];
   
    
    $task->save();
    }
   
    
}
return redirect(route("todo.listgroupitems"));  
}
public function listgroupitems(){
    $group=Group::all();
        $data=compact('group');
        return view("listgroupitems")->with($data);
}
public function status(Request $request){

    $id=$request->id;
    if($id){
    $todo=todos::find($id);
    $todo->status=$request->status;
    $todo->save();
}
    
 
    return redirect(route("todo.home"));
}

}
