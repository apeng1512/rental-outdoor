<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_rental = $_POST['id_rental'];
    $nama_penyewa = $_POST['nama_penyewa'];
    $tanggal_sewa = $_POST['tanggal_sewa'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $total_harga = $_POST['total_harga'];

    $query = "INSERT INTO transaksi (id_rental, nama_penyewa, tanggal_sewa, tanggal_kembali, total_harga, status) 
              VALUES ('$id_rental', '$nama_penyewa', '$tanggal_sewa', '$tanggal_kembali', '$total_harga', 'Belum Selesai')";

    if ($conn->query($query) === TRUE) {
        echo "Transaksi berhasil ditambahkan!";
        header('Location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<link rel="stylesheet" href="style.css"><h1>Tambah Transaksi Penyewaan</h1>
<form method="post" action="">
    <label for="id_rental">Barang Rental:</label>
    <select name="id_rental" required>
        <?php
        $query = "SELECT * FROM rental WHERE status = 'Tersedia'";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['nama_barang'] . "</option>";
        }
        ?>
    </select><br>

    <label for="nama_penyewa">Nama Penyewa:</label>
    <input type="text" name="nama_penyewa" required><br>

    <label for="tanggal_sewa">Tanggal Sewa:</label>
    <input type="date" name="tanggal_sewa" required><br>

    <label for="tanggal_kembali">Tanggal Kembali:</label>
    <input type="date" name="tanggal_kembali" required><br>

    <label for="total_harga">Total Harga:</label>
    <input type="number" name="total_harga" required><br>

    <button type="submit">Tambah Transaksi</button>
</form>