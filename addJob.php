<?php
use App\Models\Job;
// Variables Globales 
//var_dump($_GET);
//var_dump($_POST);

if (!empty($_POST)) {
    $job = new Job();
    $job->title = $_POST['title'];
    $job->description = $_POST['description'];
    $job->months = $_POST['months'];
    $job->save();
}
?>

<html>
    <head>
         <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
            crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        
        <title>Add Job</title>
    </head>
    <body>
        <h1>Add Job</h1>
        <form action="addJob.php" method="post">
            <label for="">Title:</label>
            <input type="text" name="title"></br>
            <label for="">Description:</label>
            <input type="text" name="description"></br>
            <label for="">Months:</label>
            <input type="int" name="months"></br>
            <button type="submit">Save</button>
        </form>
    </body>
</html>
