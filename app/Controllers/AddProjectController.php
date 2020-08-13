<?php 

namespace App\Controllers;
use App\Models\{Project, Technology, ProjectAndTechnologyRelation};

class AddProjectController {
    public function getAddProjectAction($request) {
        $technologies = Technology::all();
        // Variables Globales 
        //var_dump($_GET);
        //var_dump($_POST);

        if ($request->getMethod() == 'POST') {

            $postData = $request->getParsedBody();
            $project = new Project();
            $project->title = $postData['title'];
            $project->description = $postData['description'];
            $project->save();

            foreach ($postData['technologies_selected'] as $value => $selected) {
                $projectTechnologies = new ProjectAndTechnologyRelation();
                $projectTechnologies->technology_id = Technology::where('name', $value)->first()->id;
                $projectTechnologies->project_id = $project->id;
                $projectTechnologies->save();
            }
            
        }

        include '../views/addProject.php';
        
    }
}