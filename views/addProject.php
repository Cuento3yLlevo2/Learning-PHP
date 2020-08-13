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
