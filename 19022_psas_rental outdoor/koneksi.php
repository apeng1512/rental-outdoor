<?php
$host = 'localhost'; // Host database
$username = 'root'; // Username MySQL
$password = ''; // Password MySQL (kosong secara default di Laragon)
$dbname = 'rental_outdoor'; // Nama database yang telah dibuat

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
