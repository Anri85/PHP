<?php
    require 'functions.php';
    if (!isset($_SESSION['ID'])) {
        header('Location: login.php');
    }
        $name = $_GET["keyword"];
            $result = mysqli_query($conn, "SELECT * FROM tb_identitas WHERE Namapengguna LIKE '%$name%'");
        var_dump($name);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <title>Result</title>
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
        </nav><br><br><br>

    <div class="container-sm">
    <h2 class="text-center">Result for <?php echo($_GET["keyword"]) ?></h2>
        <?php foreach($result as $hasil) :?>
        <input type="hidden" name="ID" value="<?php echo ($hasil["ID"]) ?>">
            <div class="media">
            <img src="img/<?php echo ($hasil["Gambarpengguna"]) ?>" class="mr-3 rounded-lg" height="150" width="150">
            <div class="media-body">
                <h5 class="mt-0"><?php echo ($hasil["Namapengguna"]) ?></h5>
                <p><?php echo ($hasil["Tentangpengguna"]) ?></p>
                    <a href="View.php?id_user=<?php echo ($hasil["id_user"]);?>">View Profile</a> |
            </div>
            </div><br>
        <?php endforeach ?>
    </div>





        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>
</html>