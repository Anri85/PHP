<?php
session_start();
    // menyambungkan pada database
    $conn = mysqli_connect("localhost", "devourso_devours", "Dandi.129@", "devourso_portfolio");

    function query($query) {
        global $conn;
            $result = mysqli_query($conn, $query);
            $rows = [];
        while ($use = mysqli_fetch_assoc($result)) {
            $rows[] = $use;
        }return $rows;
    }

    function add($data) {
        global $conn;
            $id_user = $data["id_user"];
            $name = htmlspecialchars($data["namaskill"]);
            $about = htmlspecialchars($data["tentangskill"]);
            // cara mengupload gambar
            $picture = upload();
                if (!$picture) {
                    return false;
                }
        $arr ="INSERT INTO tb_skill
            VALUES
                ('', '$id_user', '$name', '$about', '$picture')";
            mysqli_query($conn, $arr);
                return mysqli_affected_rows($conn);
    }
    
    function edit($data) {
        global $conn;
        global $namefile;
            $id = $data["id_user"];
            $name = htmlspecialchars($data["nama_pengguna"]);
            $about = htmlspecialchars($data["about"]);
            $previousimage = $data["gambarpenggunalama"];
            // cek apakah user memilih gambar baru atau tidak:
            if ($_FILES["gambarpengguna"]["error"] === 4) {
                $gambar = $previousimage;
            }else {
                $gambar = upload();
            }
        $arr =  "UPDATE tb_identitas SET
                    Namapengguna = '$name', Tentangpengguna = '$about', Gambarpengguna = '$gambar'
                WHERE id_user = '$id'";
        mysqli_query($conn, $arr);
            return mysqli_affected_rows($conn);
    }

    function search($keyword) {
        $cari = "SELECT * FROM tb_identitas WHERE
            Namapengguna LIKE '%$keyword%'";
        return mysqli_query($conn, $cari);
    }

    function upload() {
        $namefile = $_FILES["gambarpengguna"]["name"];
        $filesize = $_FILES["gambarpengguna"]["size"];
        $error = $_FILES["gambarpengguna"]["error"];
        $filedir = $_FILES["gambarpengguna"]["tmp_name"];
        // apakah diharuskan mengupload gambar:
            if ($error === 4) {
                echo
                    "<script>
                        alert('Please Upload Picture');
                    </script>";
                return false;
            }
        // mengecek apakah yang diupload adalah gambar atau bukan
        $extensionfilevalid = ["jpg", "jpeg", "png"];
        $extensionfile = explode(".", $namefile);
        $extensionfile = strtolower(end($extensionfile));
            if (!in_array($extensionfile, $extensionfilevalid)) {
                echo
                    "<script>
                        alert('Uploaded file is invalid');
                    </script>";
                return false;
            }
        // mengecek ukuran file:
        if ($filesize > 5000000) {
            echo
                "<script>
                    alert('File size is too large');
                </script>";
            return false;
        }
        // generate nama file baru agar tidak memiliki kesamaan dengan user lain:
        $newnamefile = uniqid();
        $newnamefile .= ".";
        $newnamefile .= $extensionfile;
        // file sudah lolos dan tinggal diupload:
        move_uploaded_file($filedir, 'img/' . $newnamefile);
            return $newnamefile;
    }

    function registration($data) {
        global $conn;
            $username = strtolower (stripslashes($data["username"]));
            $password = mysqli_real_escape_string($conn, $data["password"]);
            $confirm_password = mysqli_real_escape_string($conn, $data["confirm_password"]);
            // mengecek apakah username sudah digunakan oleh user lain:
                $result = mysqli_query($conn, "SELECT Username FROM tb_users WHERE username = '$username'");
                    if (mysqli_fetch_assoc($result)) {
                        echo
                            "<script>
                                alert('Username not aviable');
                                document.location.href ='registration.php';
                            </script>";
                        return false;
                    }
                // mengecek konfirmasi password:
                if ($password !== $confirm_password) {
                    echo
                        "<script>
                            alert ('Confirm password not match');
                        </script>";
                    return false;
                }
            // mengenkripsi password:
                $password = password_hash($password, PASSWORD_DEFAULT);
            // tambahkan user baru kedalam database:
                mysqli_query ($conn, "INSERT INTO tb_users VALUES ('', '$username', '$password')");
                    return mysqli_affected_rows($conn);
    }

    function delete($id) {
        global $conn;
            mysqli_query ($conn, "DELETE FROM tb_skill WHERE ID = $id");
            return mysqli_affected_rows($conn);
    }

    function edit2($data) {
        global $conn;
        global $namefile;
            $id = $data["ID"];
            $name = htmlspecialchars($data["namaskill"]);
            $about = htmlspecialchars($data["tentangskill"]);
            $previousimage = $data["gambarlama"];
            // cek apakah user memilih gambar baru atau tidak:
            if ($_FILES["gambarpengguna"]["error"] === 4) {
                $gambar = $previousimage;
            }else {
                $gambar = upload();
            }
        $arr =  "UPDATE tb_skill SET
                    namaskill = '$name', tentangskill = '$about', Gambar = '$gambar'
                WHERE ID = '$id'";
        mysqli_query($conn, $arr);
            return mysqli_affected_rows($conn);
    }
?>