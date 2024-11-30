<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Pastikan user_id ada di session
$user_id = $_SESSION['user_id'];

// Mengambil daftar barang yang tersedia untuk disewa
$query = "SELECT * FROM rental WHERE status = 'tersedia'";
$result = $conn->query($query);

// Menangani pemesanan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $barang_id = $_POST['barang_id'];
    $tanggal_sewa = $_POST['tanggal_sewa'];
    $tanggal_kembali = $_POST['tanggal_kembali'];

    // Menambahkan transaksi sewa ke dalam tabel transaksi
    $query = "INSERT INTO transaksi (user_id, barang_id, tanggal_sewa, tanggal_kembali) 
              VALUES ('$user_id', '$barang_id', '$tanggal_sewa', '$tanggal_kembali')";
    if ($conn->query($query) === TRUE) {
        // Update status barang menjadi 'disewa'
        $update_query = "UPDATE rental SET status = 'disewa' WHERE id = '$barang_id'";
        $conn->query($update_query);
        echo "Barang berhasil disewa!";
    } else {
        echo "Terjadi kesalahan: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penyewaan Barang Outdoor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <h1>Pilih Barang yang Ingin Disewa</h1>
        <form method="POST">
            <label for="barang_id">Pilih Barang:</label>
            <select name="barang_id" required>
                <option value="">-- Pilih Barang --</option>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['nama_barang']; ?> - <?php echo $row['harga']; ?></option>
                <?php } ?>
            </select><br>

            <label for="tanggal_sewa">Tanggal Sewa:</label>
            <input type="date" name="tanggal_sewa" required><br>

            <label for="tanggal_kembali">Tanggal Kembali:</label>
            <input type="date" name="tanggal_kembali" required><br>

            <button type="submit">Sewa Barang</button>
        </form>
    </div>
</body>
</html>
