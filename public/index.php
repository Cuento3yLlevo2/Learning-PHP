<?php 
// vamos a inicializar las variables de errores en php
// solo se utiliza cuando estamos desarrollando
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as Capsule;
// Aura.Router
use Aura\Router\RouterContainer;

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


$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

// Aura.Router
$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();
$map->get('index', '/cursophp/', [
    'controller'=> 'App\Controllers\IndexController',
    'action' => 'indexAction'
    ]);
$map->get('addJobs', '/cursophp/jobs/add', [
    'controller'=> 'App\Controllers\AddJobController',
    'action' => 'getAddJobAction'
    ]);
$map->get('addProjects', '/cursophp/projects/add', [
    'controller'=> 'App\Controllers\AddProjectController',
    'action' => 'getAddProjectAction'
    ]);
$map->post('saveJobs', '/cursophp/jobs/add', [
      'controller'=> 'App\Controllers\AddJobController',
      'action' => 'getAddJobAction'
      ]);
$map->post('saveProjects', '/cursophp/projects/add', [
      'controller'=> 'App\Controllers\AddProjectController',
      'action' => 'getAddProjectAction'
      ]);

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

use App\Models\{Job, Project, Technology, ProjectAndTechnologyRelation};
function printJob($job){
    // if($job->visible == false) {
    //     return;
    // }
    echo '<li class="work-position">';
    echo '<h5>' . $job->title . '</h5>';
    echo '<p>' . $job->description . '</p>';
    echo '<p>' . $job->getDurationAsString() . '</p>';
    echo '<strong>Achievements:</strong>';
    echo '<ul>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '</ul>';
    echo '</li>';
  }
  
  function printProject($project){
    echo '<div class="project">';
    echo        '<h5>'. $project->title .'</h5>';
    echo        '<div class="row">';
    echo            '<div class="col-3">';
    echo                '<img id="profile-picture" src="https://ui-avatars.com/api/?name=Manuel+Hermoso&size=255" alt="">';
    echo              '</div>';
    echo                '<div id="technologies" class="col">';
    echo                '<p>'. $project->description .'</p>';
    echo                '<strong>Technologies used: </strong>';
  
    $technologies = Technology::all();
    $projectTechnologiesRelations = ProjectAndTechnologyRelation::all();
    foreach ($projectTechnologiesRelations as $projectTechnologyRelation) {
      if ($projectTechnologyRelation->project_id == $project->id){
        foreach ($technologies as $technology) {
          if ($technology->id == $projectTechnologyRelation->technology_id) {
            echo '<span class="badge badge-secondary" style="
            margin: 3px">'. $technology->name .'</span>';
          }
        }
      }
    }
    echo              '</div>'; 
    echo        '</div>';
    echo      '</div>';
  }



if (!$route) {
    echo 'No route found ';
} else {
    $handlerData = $route->handler;
    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];
    // instanciar una clase con una cadena y ejecuta funcion con una cadena
    $controller = new $controllerName;
    $controller->$actionName($request);
}
