<?php
// termasuk file koneksi database
include_once("db.php");

// mengambil data dalam urutan menurun (masuk pertama kali)
$result = $db->query("SELECT * FROM users ORDER BY id ASC");
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

  <title>CRUD - PDO</title>
</head>

<body>
  <div class="container">
    <h1>CRUD - PDO</h1>

    <a class="btn btn-secondary active btn-sm" href="tambah.php">Tambah Data</a>

    <br /><br />

    <table class="table table-bordered table-hover table-sm">
      <thead class="table-success text-center">
        <th>Nama</th>
        <th>Umur</th>
        <th>Email</th>
        <th>Update</th>
      </thead>

      <tbody>
        <?php
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
          echo "<tr>";
          echo "<td>" . $row['nama'] . "</td>";
          echo "<td class='text-center'>" . $row['umur'] . "</td>";
          echo "<td>" . $row['email'] . "</td>";
          // echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | 
          // <a href=\"hapus.php?id=$row[id]\" onClick=\"return confirm('Apakah Anda yakin ingin menghapus?')\">Hapus</a></td>";        
          echo "<td class='text-center'>
                <div class='btn-group btn-group-sm'>
                  <a class='btn btn-secondary active' href=\"edit.php?id=$row[id]\">Edit</a>
                  <a class='btn btn-secondary' href=\"hapus.php?id=$row[id]\" onClick=\"return confirm('Apakah Anda yakin ingin menghapus?')\">Hapus</a>
                </div>
              </td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>

</html>
