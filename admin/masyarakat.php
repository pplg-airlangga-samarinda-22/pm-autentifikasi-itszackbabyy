<?php
    session_start();
    require "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masyarakat</title>
</head>
<body>
    <h1>Data Masyarakat</h1>
    <a href="../admin/index1.php"> << KEMBALI </a>
    <a href="masyarakat-form.php">Tambah Masyarakat</a>
    <table>
        <thead>
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php
            $no = 0;
            $sql = "SELECT * FROM masyarakat";
            $rows = $koneksi->execute_query($sql)->fetch_all(MYSQLI_ASSOC);
            foreach ($rows as $row) {
                // var_dump($row);
            ?>
            <tr>
            <td><?= ++$no?></td>
            <td><?=$row['nik']?></td>
            <td><?=$row['nama']?></td>
            <td><?=$row['username']?></td>
            <td><?=$row['telp']?></td>
            <td>
                <a href="masyarakat-edit.php?nik=<?=$row['nik']?>">edit</a>
                <a href="masyarakat-hapus.php?nik=<?=$row['nik']?>">hapus</a>
            </td>
            </tr>
            <?php } ?>
            
        </tbody>
    </table>
    <a href="./index1.php">Kembali</a>
</body>
</html>