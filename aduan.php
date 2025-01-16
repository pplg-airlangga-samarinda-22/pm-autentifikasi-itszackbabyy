<?php 
    session_start();
    require_once "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aduan</title>
</head>
<body>
    <h1>Halaman Pengaduan</h1>
    <a href="form-aduan.php">Tambah</a>
    <table>
        <thead>
            <th>no</th>
            <th>tanggal</th>
            <th>Laporan</th>
            <th>Status</th>
            <th>Aksi</th>
        </thead>

        <tbody>
            <?php 
            $nik = $_SESSION['nik'];
            $no=0;
            $sql = "SELECT * FROM pengaduan WHERE nik=? order by id_pengaduan desc";
            $pengaduan = $koneksi->execute_query($sql, [$nik])->fetch_all(MYSQLI_ASSOC);
            foreach ($pengaduan as $item) {
                ?>
                <tr>
                    <td><?= ++$no; ?></td>
                    <td><?= $item['tgl_pengaduan']; ?></td>
                    <td><?= $item['isi_laporan']; ?></td>
                    <td><?= ($item['status'] == '0')?'menuggu':(($item['status'] == 'proses')?'diproses' : 'selesai') ?></td>
                    <td><a href='edit-aduan.php?id=<?=$item['id_pengaduan']?>'>edit</a></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>