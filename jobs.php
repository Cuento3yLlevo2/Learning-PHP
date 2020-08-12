<?php

require_once 'vendor/autoload.php';
use App\Models\{Job, Project, Printable};
// use Lib1\Project;



$job1 = new Job('PHP Developer','Working as PHP Developer is very fun!', true, 16);

$job2 = new Job('Python Developer','My favorite thing using Python is Data Science', true, 4);

$job3 = new Job('Java Developer','It is pretty good when creating movile apps!', true, 5);

$job4 = new Job('Node Dev','Used on the backend', false, 8);

$project1 = new Project('Foood delivery app', 'A project to clone a food delivery app like Glovo', ['JAVA','XML']);
$project2 = new Project('Your Future You', 'A project to train an AI to show you your future you depending on whether you smoke cigarettes and how much.', ['PHP','HLTM','CSS']);


$jobs = [
  $job1,
  $job2,
  $job3,
  $job4
  ];

$projects = [
  $project1,
  $project2
];


  
function printJob(Printable $job){
if($job->visible == false) {
    return;
}
echo '<li class="work-position">';
echo '<h5>' . $job->getTitle() . '</h5>';
echo '<p>' . $job->getDescription() . '</p>';
echo '<p>' . $job->getDurationAsString() . '</p>';
echo '<strong>Achievements:</strong>';
echo '<ul>';
echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
echo '</ul>';
echo '</li>';
}

function printProject(Printable $project){
echo '<div class="project">';
echo        '<h5>'. $project->getTitle() .'</h5>';
echo        '<div class="row">';
echo            '<div class="col-3">';
echo                '<img id="profile-picture" src="https://ui-avatars.com/api/?name=Manuel+Hermoso&size=255" alt="">';
echo              '</div>';
echo                '<div class="col">';
echo                '<p>'. $project->getDescription() .'</p>';
echo                '<strong>Technologies used: </strong>';
echo                $project->printTechnologies();
echo              '</div>'; 
echo        '</div>';
echo      '</div>';
}