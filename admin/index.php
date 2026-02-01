<?php
// require_once "../middleware/admin_guard.php";
// require_once "../config/database.php";
require_once __DIR__ . "/../middleware/admin_guard.php";
require_once __DIR__ . "/../config/database.php";

$data = mysqli_query($koneksi,"SELECT * FROM barang");
?>

<link rel="stylesheet" href="../assets/css/style.css">

<div class="sidebar">
  <h2>Admin Panel</h2>
  <a href="index.php" class="active">Detail Barang</a>
  <a href="barang_create.php">Tambah Barang</a>
  <a href="../auth/logout.php">Logout</a>
</div>

<div class="content">
  <h1>Manajemen Barang</h1>

  <table>
    <tr>
      <th>Nama</th>
      <th>Stok</th>
      <th>Aksi</th>
    </tr>

    <?php while($d=mysqli_fetch_assoc($data)): ?>
    <tr>
      <td><?= $d['nama_material'] ?></td>
      <td><?= $d['stok'] ?></td>
      <td>
        <a class="btn" href="stok_masuk.php?id=<?= $d['id'] ?>">+</a>
        <a class="btn" href="stok_keluar.php?id=<?= $d['id'] ?>">-</a>
        <a class="btn btn-danger" href="barang_delete.php?id=<?= $d['id'] ?>">Hapus</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</div>

