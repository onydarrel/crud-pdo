<?php
// termasuk file koneksi database
include("db.php");

// mendapatkan ID dari data dari URL
$id = $_GET['id'];

// menghapus baris dari tabel
$sql = "DELETE FROM users WHERE id=:id";
$query = $db->prepare($sql);
$query->execute(array(':id' => $id));

// mengarahkan ke halaman tampilan (index. php dalam kasus kami)
header("Location:index.php");
