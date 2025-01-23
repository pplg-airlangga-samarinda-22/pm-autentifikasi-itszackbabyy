<?php
session_start();
require "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $nik = $_GET['nik'];
    $sql = "SELECT * FROM masyarakat where nik=?";
    $row = $koneksi->execute_query($sql, [$nik])->fetch_all();
    $nama = $row['nama'];
    $username = $row['username'];
    $telp = $row['telp'];
}elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nik = $_GET['nik'];
    $nama = $_POST['nama'];
    $telp = $_POST['telepon'];

    $sql = "UPDATE masyarakat SET nama=?, telp=? WHERE nik=?";
    $row = $koneksi->execute_query($sql, [$nama, $telp, $nik]);

    if ($row) {
        header("location:masyarakat.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit masyarakat</title>
</head>
<body>
    <h1>Edit Data Masyarakat</h1>
    <form action="" method="post">
    <div class="form-item">
        <label for="nik">NIK</label>
        <input type="text" name="nama" id="nik" value="<?=$nik?>" disabled >
    </div>
    <div class="form-item">
        <label for="nama">nama</label>
        <input type="text" name="nama" id="nama" value="<?=$nama?>">
    </div>
    <div class="form-item">
        <label for="telepon">telepon</label>
        <input type="tel" name="telepon" id="telepon" value="<?=$telp?>">
    </div>        
    <div class="form-item">
        <label for="username">Username</label>
        <input type="text" name="username0" id="username" value="<?=$username?>">
    </div>    
    <button type="submit">Edit</button>
    <a href="masyarakat.php">Batal</a>
    </form>
</body>
</html>

