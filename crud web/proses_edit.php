<?php
    include('db.php');

    if(isset($_POST['id'])){
        $id = $_POST['id'];
    } else {
        echo "<script>alert('ID is not set!');window.location='read.php';</script>";
        exit();
    }
    
    $username = $_POST['username'];
    $password = $_POST['password'];;
    $foto = $_FILES['foto']['name'];

    if ($foto != "") {
        $ekstensi_diperbolehkan = array('png', 'jpg');
        $x = explode('.', $foto);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['foto']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_foto_baru = $angka_acak.'-'.$foto;

        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, 'foto/'.$nama_foto_baru);

            $query = "UPDATE users SET username = '$username',password = '$password',foto = '$nama_foto_baru'";
            $query .= " WHERE id = $id";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                die("Query Error : ".mysqli_errno($conn)."-".mysqli_error($conn));
            } else {
                echo "<script>alert('Data berhasil diubah');window.location='read.php'</script>";
            }

        } else {
            echo "<script>alert('Ekstensi foto hanya bisa png dan jpg!');window.location='read.php';</script>";
        }
    } else {
        $query = "UPDATE users SET username = '$username',password = '$password'";
        $query .= " WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Query Error : ".mysqli_errno($conn)."-".mysqli_error($conn));
        } else {
            echo "<script>alert('Data berhasil diubah');window.location='read.php'</script>";
        }
    }
?>
