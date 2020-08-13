<?php
// termasuk file koneksi database
include_once("db.php");

if (isset($_POST['update'])) {
	$id = $_POST['id'];

	$nama = $_POST['nama'];
	$umur = $_POST['umur'];
	$email = $_POST['email'];

	// memeriksa bidang kosong
	if (empty($nama) || empty($umur) || empty($email)) {

		if (empty($nama)) {
			echo "<font color='red'>Nama kolom kosong.</font><br/>";
		}

		if (empty($umur)) {
			echo "<font color='red'>Kolom umur kosong.</font><br/>";
		}

		if (empty($email)) {
			echo "<font color='red'>Kolom email kosong.</font><br/>";
		}
	} else {
		// memperbarui tabel
		$sql = "UPDATE users SET nama=:nama, umur=:umur, email=:email WHERE id=:id";
		$query = $db->prepare($sql);

		$query->bindparam(':id', $id);
		$query->bindparam(':nama', $nama);
		$query->bindparam(':umur', $umur);
		$query->bindparam(':email', $email);
		$query->execute();

		// Alternatif untuk di atas bindParam dan mengeksekusi
		// $query->execute(array(':id' => $id, ':nama' => $nama, ':email' => $email, ':umur' => $umur));

		// redirectig ke halaman tampilan. Dalam kasus kami, itu adalah index.php
		header("Location: index.php");
	}
}
?>
<?php
// mendapatkan ID dari URL
$id = $_GET['id'];

// memilih data yang terkait dengan ID tertentu
$sql = "SELECT * FROM users WHERE id=:id";
$query = $db->prepare($sql);
$query->execute(array(':id' => $id));

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$nama = $row['nama'];
	$umur = $row['umur'];
	$email = $row['email'];
}
?>
<html>

<head>
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Beranda</a>
	<br /><br />

	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" value="<?php echo $nama; ?>"></td>
			</tr>
			<tr>
				<td>Umur</td>
				<td><input type="text" name="umur" value="<?php echo $umur; ?>"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email; ?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>

</html>