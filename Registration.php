<?php
    require 'functions.php';
        if (isset($_POST["submit"])) {
                    if (registration($_POST) > 0) {
                        echo 
                            "<script>
                                alert ('Register was successful');
                                document.location.href = 'login.php';
                            </script>";
                    }else {
                        echo mysqli_error($conn);
                    }
                $username = $_POST["username"];
                $result = mysqli_query($conn, "SELECT * FROM tb_users WHERE Username = '$username'");
                mysqli_num_rows($result);
                $row = mysqli_fetch_assoc($result);

                    $id_user = $row["ID"];
                    $name = "Insert Your Name";
                    $about = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
                    $picture = "img4.png";

                mysqli_query($conn, "INSERT INTO tb_identitas VALUES ('', '$id_user', '$name', '$picture', '$about')");
                return mysqli_affected_rows ($conn);
            
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <title>Registration Page</title>
</head>
<body><br>
    <h2 class="text-center">Register</h2><br>
        <form action="" method="post">
        <div class="container-sm">
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

            <div class="input-group flex-nowrap">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">Password2</span>
                </div>
                    <input type="password" class="form-control" placeholder="Confirm Password" aria-label="Password" aria-describedby="addon-wrapping" name="confirm_password" autocomplete="off">
            </div><br>
            <button type="submit" class="btn btn-primary" name="submit">Sign up</button> |
            <a href="login.php">Login</a>
        </form>
        </div>
</body>
</html>