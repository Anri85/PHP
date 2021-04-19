<?php
     require 'functions.php';
        if (!isset($_SESSION['ID'])) {
                header("Location: login.php");
        }
                $id = $_GET["ID"];
                    if (delete($id) > 0) {
                    echo"<script>
                            alert ('Data has been deleted');
                            document.location.href = 'index.php';
                        </script>";
                }else {
                    echo"<script>
                            alert ('Data failed to delete');
                            document.location.href = 'index.php';
                        </script>";
                    }
?>
