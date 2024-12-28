<?php
include 'includes/db_connect.php'; // Menghubungkan ke database

// Mengambil data siswa dari database
$result = $conn->query("SELECT * FROM siswa ORDER BY created_at DESC");

// Pencarian data siswa
$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $result = $conn->query("SELECT * FROM siswa WHERE nama LIKE '%$search%' ORDER BY created_at DESC");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Data Siswa</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<header>
    <h1>Manajemen Data Siswa</h1>
</header>

<main>
    <section class="search-section">
        <form method="GET" action="">
            <input type="text" name="search" placeholder="Cari nama siswa..." value="<?php echo $search; ?>">
            <button type="submit">Cari</button>
        </form>
    </section>

    <section class="table-section">
        <h2>Daftar Siswa</h2>
        <a href="add_siswa.php" class="tambah-siswa">Tambah Siswa</a>
        <table>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <a href="edit_siswa.php?id=<?php echo $row['id']; ?>">Edit</a> |
                        <a href="delete_siswa.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </section>
</main>

<footer>
    <p>&copy; 2024 Manajemen Data Siswa || Kelompok 2</p>
</footer>

</body>
</html>

<?php
$conn->close();
?>
