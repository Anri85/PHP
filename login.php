<?php

    include 'functions.php';

    if (isset($_SESSION["ID"])) { 
        header("Location: index.php");
        exit;
    }
        if (isset($_POST["submit"])) {
            
            $username = $_POST["username"];
            $password = $_POST["password"];

            $result = mysqli_query($conn, "SELECT * FROM tb_users WHERE Username='$username'");

            if(mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                if(password_verify($password, $row['Password'])){
                    $_SESSION['ID'] = $row['ID'];
                        if($_SESSION['ID'] !== null){
                            header('Location: index.php');
                        }
                }
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <title>Login</title>
</head>
<body><br>
    <h2 class="text-center">Login</h2><br>
        <div class="container-sm">
            <form action="" method="post">
            <div class="input-group flex-nowrap">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">Username</span>
                </div>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping" name="username" autocomplete="off">
            </div><br>

            <div class="input-group flex-nowrap">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">Password</span>
                </div>
                    <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="addon-wrapping" name="password" autocomplete="off">
            </div><br>
                <button type="submit" class="btn btn-primary" name="submit">Login</button> |
                <a href="Registration.php">Register</a>
            </form>
        </div>
</body>
</html>