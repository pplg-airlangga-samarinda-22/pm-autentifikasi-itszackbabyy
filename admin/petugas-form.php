<?php
session_start();
require "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $telp = $_POST['telepon'];
    $level = $_POST['telepon'];
    $sql = "INSERT INTO petugas (nama_petugas,  username, password, telp, level) values (?, ?, ?, ?)";
    $row = $koneksi->execute_query($sql, [$nama, $username, $password, $telp, $level]);

    if ($row) {
        header("location:petugas.php");
    }else {
        echo "<script>alert('Gagal menambahkan petugas');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Petugas</title>
</head>
<body>
    <h1>Edit Petugas</h1>
    <form action="" method="post">
        <div class="form-item">
            <label for="level">Level akses</label>
            <select name="level" id="level">
             <option value="" disabled selected>Pilih Level</option>
             <option value="admin">admin</option>
             <option value="petugas">Petugas</option>
            </select>
        </div>
        <div class="form-item">
            <label for="nama">Nama Petugas</label>
            <input type="text" name="nama" id="nama">
        </div>
        <div class="form-item">
            <label for="telepon">Telepon</label>
            <input type="tel" name="telepon" id="telepon">
        </div>
        <div class="form-item">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
        
        </div>
        <div class="form-item">
            <label for="password">password</label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit">Kirim</button>

        <a href="./petugas.php">Batal</a>
    </form>
</body>
</html>