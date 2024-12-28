<?php
include 'includes/db_connect.php'; // Menghubungkan ke database

// Proses tambah data siswa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];

    $sql = "INSERT INTO siswa (nama, alamat, email) VALUES ('$nama', '$alamat', '$email')";
    
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAMBAH DATA SISWA</title>
    <link rel="stylesheet" href="assets/style.css"> <!-- Menambahkan CSS -->
</head>

<body>

<h2>TAMBAH SISWA</h2>

<form method="POST" action="">
    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama" required><br><br>

    <label for="alamat">Alamat:</label>
    <textarea id="alamat" name="alamat" required></textarea><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <button type="submit">Simpan</button>
</form>

</body>
</html>

<?php
$conn->close();
?>
