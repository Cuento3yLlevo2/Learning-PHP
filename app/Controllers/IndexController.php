<?php

namespace App\Controllers;

use App\Models\{Job, Project, Technology, ProjectAndTechnologyRelation};

class IndexController extends BaseController {
    public function indexAction() {

        
        // tipiado devil 
        $lastName = 'Hermoso';
        // las comillas dobles representan una string con formateo
        //$limitMonths = 2000;

        $name = "Manuel Alejandro $lastName";
        $jobs = Job::all();
        $projects = Project::all();
        $projectTechnologiesRelations = ProjectAndTechnologyRelation::all();
        $technologies = Technology::all();
        
    
        return $this->renderHTML('index.twig', [
            'name' => $name,
            'jobs' => $jobs,
            'projects' => $projects,
            'projectTechnologiesRelations' => $projectTechnologiesRelations,
            'technologies' => $technologies
        ]);

    }


    
}