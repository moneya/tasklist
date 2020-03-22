<?php

namespace App\Http\Controllers;

use App\Project;
use Redirect;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
        public function index()
        {

            $projects = Project::orderBy("created_at", "DESC")->get();
            // return view("task", compact("tasks"));
            return view('welcome', compact("projects"));
        }

        public function store(Request $request)
        {

            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                
            ]);
    
            if ($validator->fails()) {
                return      back()
                            ->withErrors($validator)
                            ->withInput();
            }
 
        $project = new Project();
        $project->name = request("name");
        $project->save();
        return Redirect::back()->with("success", "project has been added");
        }
}
