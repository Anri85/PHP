<?php
    error_reporting(0);
        require 'functions.php';
        if (!isset($_SESSION['ID'])) {
          header('Location: login.php');
        }
            $session = $_SESSION['ID'];
            $users = mysqli_query($conn, "SELECT * FROM tb_identitas WHERE id_user = '$session'");
            $user = mysqli_fetch_assoc($users);

        // if (isset($_POST["search"])) {
        //     $keyword = $_POST["keyword"];
        //         $result = mysqli_query($conn, "SELECT * FROM tb_identitas WHERE Namapengguna = '$keyword'");
        //     return mysqli_affected_rows($conn, $result);
        // }

var_dump($session);
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <title>Portfolio</title>
</head>
<body>

        <input type="hidden" name="id_user" value="<?php echo $_SESSION["ID"] ?>">

        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
          <div class="container">

          <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo ($user["Namapengguna"]); ?>
    </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="Edit.php?id_user=<?php echo($_SESSION["ID"]) ?>">Edit Profile</a>
                            <a class="dropdown-item" href="myportfolio.php?id_user=<?php echo($_SESSION["ID"]) ?>">Add My Portfolio</a>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
          <a class="nav-item nav-link active" href="About.php">About<span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link">Contact</a>
          <form class="form-inline my-2 my-lg-0" action="Result.php" method="get">
            <input class="form-control mr-sm-2" type="text" name="keyword" placeholder="Search" aria-label="Search" autocomplete="off">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
          </form>
      </div>
    </div>
        </div>
      </div>

    </nav>
    <br>

    <div class="jumbotron jumbotron-fluid">
      <div class="container text-center margin:30px;">
      <img src="img/<?php echo ($user["Gambarpengguna"]); ?>" width="200" class="rounded-circle">
        <h1 class="display-5"><?php echo ($user["Namapengguna"]); ?></h1>
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
          <div class="col text-justify"><p><?php echo ($user["Tentangpengguna"]); ?></p></div>
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
        $skills = mysqli_query($conn, "SELECT * FROM tb_skill WHERE id_user = '$session'");
    ?>

    <form action="" method="post">
        <?php foreach ($skills as $skill) :?>
        <input type="hidden" name="ID" value="<?php echo ($skill["ID"]) ?>">
            <div class="media">
            <img src="img/<?php echo ($skill["gambar"]) ?>" class="mr-3 rounded-lg" height="150" width="150">
            <div class="media-body">
              <h5 class="mt-0"><?php echo ($skill["namaskill"]) ?></h5>
              <p><?php echo ($skill["tentangskill"]) ?></p>
              <a href="Delete.php?ID=<?php echo ($skill["ID"]);?>" onclick="return confirm('Are you sure?')">Delete</a> |
              <a href="Editskill.php?ID=<?php echo ($skill["ID"]);?>">Edit</a>
            </div>
            </div><br>
        <?php endforeach ?>
    </form>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>