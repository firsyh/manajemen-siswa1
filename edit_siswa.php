<?php
include 'includes/db_connect.php'; // Menghubungkan ke database

// Ambil data siswa berdasarkan ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM siswa WHERE id = $id");
    $row = $result->fetch_assoc();
}

// Proses update data siswa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];

    $sql = "UPDATE siswa SET nama='$nama', alamat='$alamat', email='$email' WHERE id=$id";
    
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
    <title>Edit Data Siswa</title>
    <link rel="stylesheet" href="assets/style.css"> <!-- Menambahkan CSS -->
</head>
<body>

<h2>Edit Data Siswa</h2>
<form method="POST" action="">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required><br><br>

    <label for="alamat">Alamat:</label>
    <textarea id="alamat" name="alamat" required><?php echo $row['alamat']; ?></textarea><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>

    <button type="submit">Update</button>
</form>

</body>
</html>

<?php
$conn->close();
?>
