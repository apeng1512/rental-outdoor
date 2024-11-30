<?php include 'header.php'; ?>
<?php
include 'koneksi.php';

$query = "SELECT id, r.nama_barang, t.nama_penyewa, t.tanggal_sewa, t.tanggal_kembali, t.total_harga, t.status
          FROM transaksi t
          JOIN rental r ON id_rental = r.id";
$result = $conn->query($query);

echo "<h1>Daftar Transaksi Penyewaan</h1>";
echo "<table border='1'>";
echo "<tr><th>Barang Rental</th><th>Nama Penyewa</th><th>Tanggal Sewa</th><th>Tanggal Kembali</th><th>Total Harga</th><th>Status</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['nama_barang'] . "</td>";
    echo "<td>" . $row['nama_penyewa'] . "</td>";
    echo "<td>" . $row['tanggal_sewa'] . "</td>";
    echo "<td>" . $row['tanggal_kembali'] . "</td>";
    echo "<td>" . $row['total_harga'] . "</td>";
    echo "<td>" . $row['status'] . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
