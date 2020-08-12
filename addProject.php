<?php

require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\{Project, Technology, ProjectAndTechnologyRelation};

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'cursophp',
    'username'  => 'lolo',
    'password'  => 'toor',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

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
?>

<html>
    <head>
         <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
            crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        
        <title>Add Project</title>
    </head>
    <body>
        <h1>Add Project</h1>
        <form action="addProject.php" method="post">
            <div>
                <label for="">Title:</label>
                <input type="text" name="title"></br>
                <label for="">Description:</label>
                <input type="text" name="description"></br>
            </div>
            <div class="form-group">
                <p>Select which technologies have the project</p>
                <?php
                foreach ($technologies as $technology) {
                    echo '<label class="light" ><input type="checkbox" name="technologies_selected[' .$technology->name . ']">' . $technology->name . '</label><br>';
                }
                ?>
            </div>
            <button type="submit">Save</button>
        </form>
    </body>
</html>
