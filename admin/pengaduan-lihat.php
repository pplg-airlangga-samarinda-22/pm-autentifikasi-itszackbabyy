<?php
session_start();
require "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM pengaduan WHERE id_pengaduan=?";
    $row = $koneksi->execute_query($sql, [$id])->fetch_assoc();
    $nik = $row['nik'];
    $laporan = $row['isi_laporan'];
    $foto = $row['foto'];
    $status = $row['status'];

    $sql = "SELECT * FROM tanggapan WHERE id_pengaduan=?";
    $row = $koneksi->execute_query($sql, [$id])->fetch_assoc();
    $tanggal_tanggapan = $row['tgl_tanggapan'];
    $tangggapan = $row['tanggapan'];
    $id_petugas = $row['id_petugas'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lihat pengaduan</title>
</head>
<body>
    <h1>Lihat Pengaduan</h1>
    <a href="./pengaduan.php">Kembali</a>
    <form action="" method="post">
    <div class="form-item">
            <label for="laporan">Isi laporan</label>
            <textarea name="laporan" id="laporan" readonly><?= $laporan ?></textarea>
        </div>
        <div class="form-item">
            <label for="foto">Foto Pendukung</label>
            <img src="../gambar/<?= $foto ?>" alt="" width="250px">
        </div>
        <div class="form-item">
            <label for="tanggal_tanggapan">Tanggal Ditanggapi</label>
            <input type="date" name="tanggal_tanggapan" id="tanggal_tanggapan" value="<?=$tanggal_tanggapan?>" disabled >
        </div>
        <div class="form-item">
            <label for="petugas">Petugas</label>
            <input type="text" name="petugas" id="petugas" value="<?=$id_petugas?>" disabled >
        </div>
        <div class="form-item">
            <label for="tanggapan">Tanggapan</label>
            <textarea name="tanggapan" id="tanggapan"></textarea>
        </div>
        <a href="./pengaduan.php">Kembali</a>
    </form>
</body>
</html>