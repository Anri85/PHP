<?php
require 'functions.php';
    if (!isset($_SESSION['ID'])) {
        header('Location: login.php');
    }
        $iduser = $_GET["id_user"];
            $views = mysqli_query($conn, "SELECT * FROM tb_identitas WHERE id_user = '$iduser'");
            $view = mysqli_fetch_assoc($views);
        var_dump($iduser);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <title>View Profile</title>
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
                        <a class="nav-item nav-link" >Contact</a>
                </div>
            </div>
        </div>
    </nav><br><br>

    <div class="jumbotron jumbotron-fluid">
        <div class="container text-center margin:30px;">
        <img src="img/<?php echo ($view["Gambarpengguna"]); ?>" width="200" class="rounded-circle">
            <h1 class="display-5"><?php echo ($view["Namapengguna"]); ?></h1>
            <p class="lead">Welcome to my portfolio</p>
        </div>
    </div>

    <div class="container">
        <div class="row">
          <div class="col text-center">
            <h1>About</h1>
          </div>
        </div>
        <div class="row">
          <div class="col text-justify"><p><?php echo ($view["Tentangpengguna"]); ?></p></div>
        </div>
      </div>
      <br>

      <div class="container text-justify">
      <div class="row">
        <div class="col text-center"><h2>Portfolio</h2>
        </div>
      </div>
      <br>

    <?php
        $skills = mysqli_query($conn, "SELECT * FROM tb_skill WHERE id_user = '$iduser'");
    ?>

    <?php foreach ($skills as $skill) :?>
            <div class="media">
            <img src="img/<?php echo ($skill["gambar"]) ?>" class="mr-3 rounded-lg" height="150" width="150">
            <div class="media-body">
              <h5 class="mt-0"><?php echo ($skill["namaskill"]) ?></h5>
              <p><?php echo ($skill["tentangskill"]) ?></p>
            </div>
            </div><br>
    <?php endforeach ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>