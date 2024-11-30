<?php
include 'koneksi.php';

$id = $_GET['id']; // Ambil ID dari URL

$query = "DELETE FROM rental WHERE id = $id";

if ($conn->query($query) === TRUE) {
    echo "Data berhasil dihapus!";
    header('Location: index.php');
} else {
    echo "Error: " . $conn->error;
}
?>
<link rel="stylesheet" href="style.css">
