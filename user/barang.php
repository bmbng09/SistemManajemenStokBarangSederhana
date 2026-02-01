<?php
// require_once "../config/database.php";
require_once __DIR__ . "/../config/database.php";

$keyword = "";
$where = "";

if (isset($_GET['q']) && $_GET['q'] !== "") {
    $keyword = mysqli_real_escape_string($koneksi, $_GET['q']);
    $where = "WHERE 
        nama_material LIKE '%$keyword%' OR
        kode_material LIKE '%$keyword%' OR
        no_rak LIKE '%$keyword%'";
}

$data = mysqli_query($koneksi, "SELECT * FROM barang $where ORDER BY nama_material ASC");
// $data = mysqli_query($koneksi,"SELECT * FROM barang");
?>

<link rel="stylesheet" href="../assets/css/style.css">

<div class="sidebar">
  <h2>Stok Barang</h2>
  <a href="dashboard.php">Dashboard</a>
  <a href="barang.php" class="active">Data Barang</a>
  <a href="../auth/login.php">Login Admin</a>
</div>

<div class="content">
  <h1>Data Barang</h1>
  <form method="get" style="margin-bottom:20px;">
    <div class="form-grid full">
      <input 
        type="text"
        name="q"
        placeholder="Cari nama / kode / no rak..."
        value="<?= htmlspecialchars($keyword) ?>"
      >
    </div>
  </form>


  <table>
    <tr>
      <th>No Rak</th>
      <th>Kode</th>
      <th>Nama</th>
      <th>Stok</th>
    </tr>

    <?php while($d=mysqli_fetch_assoc($data)): ?>
    <tr>
      <td><?= $d['no_rak'] ?></td>
      <td><?= $d['kode_material'] ?></td>
      <td><?= $d['nama_material'] ?></td>
      <td class="<?= $d['stok'] <= $d['min_stock'] ? 'low-stock':'' ?>">
        <?= $d['stok'] ?>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</div>
