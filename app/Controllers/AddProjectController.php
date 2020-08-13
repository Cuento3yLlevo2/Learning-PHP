<?php 

namespace App\Controllers;
use App\Models\{Project, Technology, ProjectAndTechnologyRelation};

class AddProjectController {
    public function getAddProjectAction() {
        $technologies = Technology::all();
        // Variables Globales 
        //var_dump($_GET);
        //var_dump($_POST);

        if (!empty($_POST)) {

            $project = new Project();
            $project->title = $_POST['title'];
            $project->description = $_POST['description'];
            $project->save();

            foreach ($_POST['technologies_selected'] as $value => $selected) {
                $projectTechnologies = new ProjectAndTechnologyRelation();
                $projectTechnologies->technology_id = Technology::where('name', $value)->first()->id;
                $projectTechnologies->project_id = $project->id;
                $projectTechnologies->save();
            }
            
        }

        include '../views/addProject.php';
        
    }
}