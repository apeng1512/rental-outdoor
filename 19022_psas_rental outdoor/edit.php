<?php
include 'koneksi.php';

$id = $_GET['id']; // Ambil ID dari URL
$query = "SELECT * FROM rental WHERE id = $id";
$result = $conn->query($query);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];
    $deskripsi = $_POST['deskripsi'];

    $query = "UPDATE rental SET nama_barang='$nama_barang', harga='$harga', status='$status', deskripsi='$deskripsi' WHERE id=$id";

    if ($conn->query($query) === TRUE) {
        echo "Data berhasil diperbarui!";
        header('Location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<h1>Edit Barang Rental</h1>
<form method="post" action="">
    <label for="nama_barang">Nama Barang:</label>
    <input type="text" name="nama_barang" value="<?php echo $row['nama_barang']; ?>" required><br>

    <label for="harga">Harga:</label>
    <input type="number" name="harga" value="<?php echo $row['harga']; ?>" required><br>

    <label for="status">Status:</label>
    <select name="status" required>
        <option value="Tersedia" <?php echo ($row['status'] == 'Tersedia') ? 'selected' : ''; ?>>Tersedia</option>
        <option value="Disewa" <?php echo ($row['status'] == 'Disewa') ? 'selected' : ''; ?>>Disewa</option>
    </select><br>

    <label for="deskripsi">Deskripsi:</label>
    <textarea name="deskripsi" required><?php echo $row['deskripsi']; ?></textarea><br>

    <button type="submit">Perbarui</button>
</form>
<link rel="stylesheet" href="style.css">
