<?php

namespace App\Repositories\Projects;

use App\Models\Project;
use App\Repositories\Projects\ProjectInterface;
use Illuminate\Support\Facades\Auth;

class ProjectRepository implements ProjectInterface
{

    public function create($params)
    {

        $params = (Object) $params;

        $project = new Project();

        $project->name = $params->name;
        $project->user_id   = Auth::id();
        $project->description  = $params->description;

        $project->save();

        return $project;
  
    }


    public function getAllByUser()
    {

        return Project::where('user_id', Auth::id())->get();

    }


    public function getProjectById($id)
    {

        return Project::findOrFail($id); 

    }

}