<?php
    require 'functions.php';
        if (!isset($_SESSION['ID'])) {
            header('Location: login.php');
        }
            if (isset($_POST["submit"])) {
                if (add($_POST) > 0) {
                    echo
                        "<script>
                            alert ('Data has been added');
                            document.location.href = 'index.php';
                        </script>";
                }else {
                    echo "<script>alert ('Data failed to add'); </script>";
                }
            }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <title>Edit</title>
</head>
<body>

        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
            
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link" href="About.php">About</a>
                        <a class="nav-item nav-link">Contact</a>
                    </div>
                </div>
            </div>
        </nav>
    
<br><br><br>
    <div class="container-sm">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="media">
                    <h3 class="mt-0">Your Skill</h3>
            </div>
            <br>
                <input type="file" name="gambarpengguna"><br><br>
                <input type="hidden" name="id_user" value="<?php echo($_SESSION["ID"]) ?>">

                    <div class="form-group">
                        <label for="namaskill">Name Skill: </label>
                        <input type="text" class="form-control" name="namaskill" id="namaskill" autocomplete="off" required>
                    </div>

                    <div class="form-group">
                        <label for="tentangskill">Description of Skill: </label>
                        <textarea class="form-control" name="tentangskill" id="tentangskill" rows="5" autocomplete="off"></textarea>
                    </div>
                <button type="submit" class="btn btn-primary" name="submit">Save</button>
            </form>
        </div>
            

    


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>