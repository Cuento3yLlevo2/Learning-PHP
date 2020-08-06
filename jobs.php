<?php

$jobs = [
    [
      'jobTitle' => 'PHP Developer',
      'jobDescription' => 'Working as PHP Developer is very fun!',
      'visible' => true,
      'months' => 16
    ],
    [
      'jobTitle' => 'Python Developer',
      'jobDescription' => 'My favorite thing using Python is Data Science',
      'visible' => false,
      'months' => 14
    ],
    [
      'jobTitle' => 'Java Developer', 
      'jobDescription' => 'It is pretty good when creating movile apps!',
      'visible' => true,
      'months' => 5
    ],
    [
      'jobTitle' => 'Node Dev',
      'jobDescription' => 'My favorite thing using Python is Data Science',
      'visible' => true,
      'months' => 24
    ],
    [
      'jobTitle' => 'Frontend Dev', 
      'jobDescription' => 'It is pretty good when creating movile apps!',
      'visible' => true,
      'months' => 3
    ]
  ];

  // funcion con operadores ternarios
// sentencia booleana ? valor si la sentencia es cierta : valor si es falsa
function getDuration($months) {
    $years = floor($months / 12);
    $xtramonths = $months % 12;
    return ($years >= 1 ? "$years years" . ($xtramonths != 0 ? " and $xtramonths months" : "") : "$months months");
  }
  
function printJob($job){
if($job['visible'] == false) {
    return;
}

echo '<li class="work-position">';
echo '<h5>' . $job['jobTitle'] . '</h5>';
echo '<p>' . $job['jobDescription'] . '</p>';
echo '<p>' . getDuration($job['months']) . '</p>';
echo '<strong>Achievements:</strong>';
echo '<ul>';
echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
echo '</ul>';
echo '</li>';
}