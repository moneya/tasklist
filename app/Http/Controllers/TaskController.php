<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;
use Illuminate\Http\Request;
use Redirect;
use Validator;

class TaskController extends Controller
{
    public function index($id){
        $project = Project::findOrfail($id);
        $tasks = Task::where('project_id',$id)->orderBy("priority", "ASC")->get();
        return view("task", compact("tasks","project"));
        }


        public function store(Request $request,$id)
        {

            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                
            ]);
    
            if ($validator->fails()) {
                return      back()
                            ->withErrors($validator)
                            ->withInput();
            }


 
        $task = new Task();
        $task->name = request("name");
        $task->project_id = $id;
        $task->save();
        return Redirect::back()->with("success", "Task has been added");
        }

        public function destroy($id)
        {
        $task = Task::find($id);
        $task->delete();
        return Redirect::back()->with('success', "Task has been deleted");
        }

        public function reorder(Request $request,$id)
        {
            $project = Project::findOrfail($id);
            $tasks = Task::where('project_id',$project->id)->get();

            

        foreach ($tasks as $task) {
            $task->timestamps = false; // To disable update_at field updation
            $id = $task->id;

            foreach ($request->order as $order) {
                if ($order['id'] == $id) {
                    $task->update(['priority' => $order['position']]);
                }
            }
        }
        
        return response('Reordered Successfully.', 200);
        }

        public function all(Request $request){
            
            $projects = Project::orderBy("created_at", "DESC")->get();
            $tasks = Task::orderBy("priority", "ASC")->get();
            return view("tasks", compact("tasks","projects"));
            }


            public function sort(Request $request){
              
                if($request->ajax())
                {

                    if($request->projects == 0)
                    {
                        $tasks = Task::orderBy("priority", "ASC")->get();
                        return view("partials.tasks", compact("tasks"));
                    }


                    if($request->projects)
                    {
                        $tasks = Task::where('project_id',$request->projects)->orderBy("priority", "ASC")->get();
                        return view("partials.tasks", compact("tasks"));
                    }
                   
                    
                    
                }
                
                }
}
