<?php

class job {
  private $jobTitle;
  public $jobDescription;
  public $visible;
  public $months;

  public function __construct($jobTitle, $jobDescription, $visible, $months) {
    $this->setJobTitle($jobTitle); 
    $this->jobDescription = $jobDescription;
    $this->visible = $visible;
    $this->months = $months;
  }

  // funcion con operadores ternarios
  // sentencia booleana ? valor si la sentencia es cierta : valor si es falsa
  public function getDurationAsString() {
    $years = floor($this->months / 12);
    $xtramonths = $this->months % 12;
    return ($years >= 1 ? "$years years" . ($xtramonths != 0 ? " and $xtramonths months" : "") : "$this->months months");
  }

  public function setJobTitle($jobTitle) {
    $this->jobTitle = $jobTitle;
  }

  public function getJobTitle() {
    return $this->jobTitle;
  }
}

$job1 = new job('PHP Developer','Working as PHP Developer is very fun!', true, 16);

$job2 = new job('Python Developer','My favorite thing using Python is Data Science', true, 4);

$job3 = new job('Java Developer','It is pretty good when creating movile apps!', true, 5);

$job4 = new job('Node Dev','Used on the backend', false, 8);

$jobs = [
  $job1,
  $job2,
  $job3,
  $job4
    // [
    //   'jobTitle' => 'PHP Developer',
    //   'jobDescription' => 'Working as PHP Developer is very fun!',
    //   'visible' => true,
    //   'months' => 16
    // ],
    // [
    //   'jobTitle' => 'Python Developer',
    //   'jobDescription' => 'My favorite thing using Python is Data Science',
    //   'visible' => false,
    //   'months' => 14
    // ],
    // [
    //   'jobTitle' => 'Java Developer', 
    //   'jobDescription' => 'It is pretty good when creating movile apps!',
    //   'visible' => true,
    //   'months' => 5
    // ],
    // [
    //   'jobTitle' => 'Node Dev',
    //   'jobDescription' => 'My favorite thing using Python is Data Science',
    //   'visible' => true,
    //   'months' => 24
    // ],
    // [
    //   'jobTitle' => 'Frontend Dev', 
    //   'jobDescription' => 'It is pretty good when creating movile apps!',
    //   'visible' => true,
    //   'months' => 3
    // ]
  ];


  
function printJob($job){
if($job->visible == false) {
    return;
}

echo '<li class="work-position">';
echo '<h5>' . $job->getJobTitle() . '</h5>';
echo '<p>' . $job->jobDescription . '</p>';
echo '<p>' . $job->getDurationAsString() . '</p>';
echo '<strong>Achievements:</strong>';
echo '<ul>';
echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
echo '</ul>';
echo '</li>';
}