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
    <th>No Rak</th>
    <th>Kode Material</th>
    <th>Nama Material</th>
    <th>Nama Rak</th>
    <th>Type</th>
    <th>Aktual Stock</th>
    <th>Satuan</th>
    <th>Min Stock</th>
    <th>Tanggal PR</th>
    <th>MAK</th>
    <th>Aksi</th>
  </tr>

  <?php while($d = mysqli_fetch_assoc($data)): ?>
  <tr>
    <td><?= $d['no_rak'] ?></td>
    <td><?= $d['kode_material'] ?></td>
    <td><?= $d['nama_material'] ?></td>
    <td><?= $d['nama_rak'] ?></td>
    <td><?= $d['type'] ?></td>

    <td class="<?= $d['stok'] <= $d['min_stock'] ? 'low-stock' : '' ?>">
      <?= $d['stok'] ?>
    </td>

    <td><?= $d['satuan'] ?></td>
    <td><?= $d['min_stock'] ?></td>
    <td><?= $d['tanggal_pr'] ?></td>
    <td><?= $d['mak'] ?></td>

    <td>
      <a class="btn" href="stok_masuk.php?id=<?= $d['id'] ?>">+</a>
      <a class="btn" href="stok_keluar.php?id=<?= $d['id'] ?>">-</a>
      <a class="btn" href="barang_update.php?id=<?= $d['id'] ?>">Edit</a>
      <a class="btn btn-danger"
         href="barang_delete.php?id=<?= $d['id'] ?>"
         onclick="return confirm('Hapus barang ini?')">
         Hapus
      </a>
    </td>
  </tr>
  <?php endwhile; ?>
</table>
</div>


