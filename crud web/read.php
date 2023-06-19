<?php
include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<center><h1>Data Nama</h1></center>
	<center><a href="tambah_data.php">+ &nbsp; Create Data</a></center>
	<br>
	<center><a href="logout.php" class="del">Log out</a></center>
	<br>
	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Username</th>
				<th>Password</th>
				<th>Foto</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$query = "SELECT * FROM users";
			$result = mysqli_query($conn, $query);

			if (!$result) {
				die("Query Error : ".mysqli_error($conn)."-".mysqli_error($conn));
			}
			$no =1;

			while ($row = mysqli_fetch_assoc($result)) {
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo substr($row['username'], 0, 20); ?></td>
				<td><?php echo $row['password']; ?></td>
				<td><img style="width: 120px;"src="./foto/<?php echo $row['foto']; ?>"></td>
				<td>
					<a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
					<a href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin ingin hapus data ini?')" class="del">Hapus</a>
					<a href="detail.php?id=<?php echo $row['id']; ?>">Detail</a>
				</td>
			</tr>
			<?php 
			$no++;
			}
			?>
		</tbody>		
	</table>
</body>
</html>
