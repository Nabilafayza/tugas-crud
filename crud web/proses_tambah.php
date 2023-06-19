<?php
	include('db.php');

	$username = $_POST['username'];
	$password = $_POST['password'];
	$foto = $_FILES['foto']['name'];
    var_dump($foto);

	if ($foto != "") {
		$ekstensi_diperbolehkan = array('png', 'jpg');
		$x = explode('.', $foto);
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['foto']['tmp_name'];
		$angka_acak = rand(1, 999);
		$nama_foto_baru = $angka_acak.'-'.$foto;

		if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
			move_uploaded_file($file_tmp, 'foto/'.$nama_foto_baru);

			$query = "INSERT INTO users (username, password, foto) VALUES ('$username','$password','$nama_foto_baru')";
			$result = mysqli_query($conn, $query);

			if (!$result) {
				die("Query Error : ".mysqli_error($conn)."-".mysqli_error($conn));
			}else {
				echo "<script>alert('Data berhasil ditambahkan');window.location='read.php'</script>";
			}

		}else {
			echo "<script>alert('Ekstensi foto hanya bisa png dan jpg!');window.location='tambah_data.php';</script>";
		}
	}else {
		$query = "INSERT INTO users (username, password) VALUES ('$username','$password')";
			$result = mysqli_query($conn, $query);

			if (!$result) {
				die("Query Error : ".mysqli_error($conn)."-".mysqli_error($conn));
			}else {
				echo "<script>alert('Data berhasil ditambahkan');window.location='read.php'</script>";
			}
		
	}



?>