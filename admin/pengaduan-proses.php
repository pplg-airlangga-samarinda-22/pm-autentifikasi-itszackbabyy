<?php 
    session_start();
    require "../koneksi.php";

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $id = $_GET['id'];
        $sql = "SELECT * FROM pengaduan WHERE id_pengaduan=?";
        $row = $koneksi->execute_query($sql,[$id])->fetch_assoc();
        // var_dump($row);
        $nik = $row['nik'];
        $laporan = $row['isi_laporan'];
        $foto = $row['foto'];
        $status = $row['status'];
    }else if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_GET['id'];
        $sql = "UPDATE pengaduan SET status='proses' WHERE id_pengaduan=?";
        $row = $koneksi->execute_query($sql, [$id]);

        if ($row){
            header("location:pengaduan.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Verifikasi dan Validasi Pengaduan</h1>
    <a href="./pengaduan.php"></a>
    <form action="" method="post">
        <div class="form-itemm">
            <label for="laporan">Isi Laporan</label>
            <textarea name="laporan" id="laporan" readonly><?= $laporan ?></textarea>
        </div>
        <div>   
         <label for="foto">Foto pendukung</label>
         <img src="../gambar/<?= $foto ?>" alt="" width="250px">   
        </div>
        <button type="submit">Proses</button>
    </form>
</body>
</html>