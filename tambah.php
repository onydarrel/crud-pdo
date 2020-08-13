<?php
// termasuk file koneksi database
include_once("db.php");

if (isset($_POST['Submit'])) {
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

		// link ke halaman sebelumnya
		echo "<br/><a href='javascript:self.history.back();'>Kembali</a>";
	} else {
		// Jika semua kolom di isi (tidak kosong)			
		// memasukkan data ke database
		$sql = "INSERT INTO users(nama, umur, email) VALUES(:nama, :umur, :email)";
		$query = $db->prepare($sql);

		$query->bindparam(':nama', $nama);
		$query->bindparam(':umur', $umur);
		$query->bindparam(':email', $email);
		$query->execute();

		// Alternatif untuk di atas bindParam dan mengeksekusi
		// $query->execute(array(':nama' => $nama, ':email' => $email, ':umur' => $umur));

		// menampilkan pesan sukses
		// echo "<font color='green'>Data berhasil ditambahkan.";
		// echo "<br/><a href='index.php'>Lihat hasil</a>";
		echo "<div class='alert alert-warning' role='alert'>Data berhasil ditambahkan.</div>";		
		echo "<br/><a class='btn btn-secondary btn-sm' href='index.php'>Lihat hasil</a>";
	}
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <title>Tambah Data</title>
</head>

<body>
    <div class="container">
        <h1>Tambah Data</h1>

        <form action="tambah.php" method="post" name="form1">
            <table width="25%" border="0">
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td><input type="text" name="umur"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input class="btn btn-secondary active btn-sm" type="submit" name="Submit" value="Tambah">
                        <a class="btn btn-secondary btn-sm" href="index.php">Batal</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>

</html>