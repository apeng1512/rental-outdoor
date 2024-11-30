<?php include 'header.php'; ?>
<?php

include 'koneksi.php';
session_start();

$query = "SELECT * FROM rental";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Outdoor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Isi halaman utama di sini -->
    <div class="container">
        <h1>Daftar Barang Rental Outdoor</h1>
        <p>Temukan berbagai perlengkapan outdoor terbaik untuk petualangan Anda!</p>
    </div>

    <div>
        <a href="tambah.php">Tambah Barang</a>
        <table>
            <tr><th>Nama Barang</th><th>Harga</th><th>Status</th><th>Deskripsi</th><th>Aksi</th></tr>

            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['nama_barang'] . "</td>";
                echo "<td>" . $row['harga'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>" . $row['deskripsi'] . "</td>";
                echo "<td><a href='edit.php?id=" . $row['id'] . "'>Edit</a> | <a href='hapus.php?id=" . $row['id'] . "'>Hapus</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
