<!DOCTYPE html>
<html>
<head>
	<title>CRUD</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<center><h1>Create Data</h1></center>
	<form method="POST" action="proses_tambah.php" enctype="multipart/form-data">
	<section class="base">
		<div>
			<label>Username</label>
			<input type="text" name="username">
		</div>
		<div>
			<label>Password</label>
			<input type="password" name="password" required="" />
		</div>
		<div>
			<label>Foto</label>
			<input type="file" name="foto" required="" />
		</div>
		<div>
			<button type="submit">Submit</button>
		</div>
	</section>
</form>
</body>
</html>