<?php
require_once 'vendor/autoload.php';
use App\Models\{Job, Project, Technology, ProjectAndTechnologyRelation};

$jobs = Job::all();
$projects = Project::all();

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
  echo                '<div class="col">';
  echo                '<p>'. $project->description .'</p>';
  echo                '<strong>Technologies used: </strong>';

  $technologies = Technology::all();
  $projectTechnologiesRelations = ProjectAndTechnologyRelation::all();
  foreach ($projectTechnologiesRelations as $projectTechnologyRelation) {
    if ($projectTechnologyRelation->project_id == $project->id){
      foreach ($technologies as $technology) {
        if ($technology->id == $projectTechnologyRelation->technology_id) {
          echo '<span class="badge badge-secondary">'. $technology->name .'</span>';
        // echo '<span class="badge badge-secondary">'. $value .'</span>';
        }
      }
    }
  }
  echo              '</div>'; 
  echo        '</div>';
  echo      '</div>';
}