<?php include('db.php');

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = "SELECT * FROM users where id = '$id'";
		$result = mysqli_query($conn, $query);
		if (!$result) {
			die("Query Error :".mysqli_errno($conn). " - ".mysqli_error($conn));
		}
		$data = mysqli_fetch_assoc($result);

		if (!count($data)) {
			echo "<script>alert('Data tidak ditemukan pada tabel.');window.location='read.php';</script>";
		}

	}else {
		echo "<script>alert('Masukkan ID yang ingin di edit');window.location='read.php';</script>";
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<center><h1>Edit Data <?php echo $data['username'];?></h1></center>
	<form method="POST" action="proses_edit.php" enctype="multipart/form-data">
	<section class="base">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
		<div>
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $data['username'];?>" />
		</div>
		<div>
			<label>Password</label>
			<input type="password" name="password" required="" value="<?php echo $data['password'];?>" />
		</div>
		<div>
			<label>Foto</label>
			<img src="foto/<?php echo $data['foto'];?>" style="width: 120px;float: left;margin-bottom: 5px;">
			<input type="file" name="foto"/>
			<i style="float: left;font-size: 11px;color: red;">Abaikan jika tidak merubah foto</i>
		</div>
		<div>
			<br>
			<button type="submit">Simpan</button>
		</div>
	</section>
</form>
</body>
</html>