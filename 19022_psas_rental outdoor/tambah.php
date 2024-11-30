


<?php include 'header.php'; ?>
<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];
    $deskripsi = $_POST['deskripsi'];

    $query = "INSERT INTO rental (nama_barang, harga, status, deskripsi) VALUES ('$nama_barang', '$harga', '$status', '$deskripsi')";

    if ($conn->query($query) === TRUE) {
        echo "Data berhasil ditambahkan!";
        header('Location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<h1>Tambah Barang Rental</h1>
<form method="post" action="">
    <label for="nama_barang">Nama Barang:</label>
    <input type="text" name="nama_barang" required><br>

    <label for="harga">Harga:</label>
    <input type="number" name="harga" required><br>

    <label for="status">Status:</label>
    <select name="status" required>
        <option value="Tersedia">Tersedia</option>
        <option value="Disewa">Disewa</option>
    </select><br>

    <label for="deskripsi">Deskripsi:</label>
    <textarea name="deskripsi" required></textarea><br>

    <button type="submit">Tambah</button>
</form>
<link rel="stylesheet" href="style.css">
