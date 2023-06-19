<?php
include 'db.php';


if (!isset($_GET['id'])) {
    die("Id parameter is missing.");
}

$id = $_GET['id'];


$query = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Data not found.");
}

$user = mysqli_fetch_assoc($result);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Details</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
   <CENter><h1>User Details</h1></CENter> 

    <table>
        <tr>
            <td>Username</td>
            <td><?php echo $user['username']; ?></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><?php echo $user['password']; ?></td>
        </tr>
        <tr>
            <td>Foto</td>
            <td><img src="./foto/<?php echo $user['foto']; ?>" style="width: 120px;"></td>
        </tr>
    </table>
</body>
</html>