<?php 
// vamos a inicializar las variables de errores en php
// solo se utiliza cuando estamos desarrollando
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

session_start();

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

// main page mapping
$map->get('index', '/cursophp/', [
    'controller'=> 'App\Controllers\IndexController',
    'action' => 'indexAction'
    ]);

// jobs mapping 
$map->get('addJobs', '/cursophp/jobs/add', [
    'controller'=> 'App\Controllers\AddJobController',
    'action' => 'getAddJobAction',
    'auth' => true
    ]);
$map->post('saveJobs', '/cursophp/jobs/add', [
    'controller'=> 'App\Controllers\AddJobController',
    'action' => 'getAddJobAction'
    ]);

// Projects mapping
$map->get('addProjects', '/cursophp/projects/add', [
    'controller'=> 'App\Controllers\AddProjectController',
    'action' => 'getAddProjectAction',
    'auth' => true
    ]);
$map->post('saveProjects', '/cursophp/projects/add', [
    'controller'=> 'App\Controllers\AddProjectController',
    'action' => 'getAddProjectAction'
    ]);

// User mapping
$map->get('addUsers', '/cursophp/users/add', [
    'controller'=> 'App\Controllers\AddUserController',
    'action' => 'getAddUserAction',
    'auth' => true
    ]);
$map->post('saveUsers', '/cursophp/users/add', [
    'controller'=> 'App\Controllers\AddUserController',
    'action' => 'getAddUserAction'
    ]);

// Login mapping
$map->get('loginForm', '/cursophp/login', [
    'controller'=> 'App\Controllers\AuthController',
    'action' => 'getLogin'
    ]);
$map->post('auth', '/cursophp/auth', [
    'controller'=> 'App\Controllers\AuthController',
    'action' => 'postLogin'
    ]);
$map->get('logout', '/cursophp/logout', [
    'controller'=> 'App\Controllers\AuthController',
    'action' => 'getLogout'
    ]);

// admin mapping
$map->get('admin', '/cursophp/admin', [
    'controller'=> 'App\Controllers\AdminController',
    'action' => 'getIndex',
    'auth' => true
    ]);


$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

if (!$route) {
    echo 'No route found ';
} else {
    $handlerData = $route->handler;
    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];
    $needsAuth = $handlerData['auth'] ?? false;

    $sessionUserId = $_SESSION['userId'] ?? null; 

    if ($needsAuth && !$sessionUserId) {
        $controllerName = 'App\Controllers\AuthController';
        $actionName = 'getLogout';
    }

    // instanciar una clase con una cadena y ejecuta funcion con una cadena
    $controller = new $controllerName;
    $response = $controller->$actionName($request);

    foreach($response->getHeaders() as $name => $values) {
        foreach($values as $value) {
            header(sprintf('%s: %s', $name, $value), false);
        }
    }
    http_response_code($response->getStatusCode());

    echo $response->getBody();
}
