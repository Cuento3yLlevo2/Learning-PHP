<?php

namespace App\Controllers;
use App\Models\{Job, Project};

class IndexController {
    public function indexAction() {

        $jobs = Job::all();
        $projects = Project::all();
        // tipiado devil 
        $lastName = 'Hermoso';
        // las comillas dobles representan una string con formateo
        $name = "Manuel Alejandro $lastName";
        // var_dump($name) usado para debugear
        $limitMonths = 2000;

        include '../views/index.php';

    }


    
}