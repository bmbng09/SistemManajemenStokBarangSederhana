<?php
require_once "../config/database.php";

/* TOTAL STOK */
$q_total_stok = mysqli_query($koneksi, "SELECT SUM(stok) AS total FROM barang");
$total_stok = mysqli_fetch_assoc($q_total_stok)['total'] ?? 0;

/* TOTAL JENIS MATERIAL */
$q_jenis = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM barang");
$total_jenis = mysqli_fetch_assoc($q_jenis)['total'] ?? 0;

/* STOK MENIPIS */
$q_low = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM barang WHERE stok <= min_stock");
$stok_menipis = mysqli_fetch_assoc($q_low)['total'] ?? 0;

/* BARANG MASUK (TOTAL STOK SAAT INI) */
$q_masuk = mysqli_query($koneksi, "SELECT SUM(stok) AS total FROM barang");
$barang_masuk = mysqli_fetch_assoc($q_masuk)['total'] ?? 0;

/* BARANG KELUAR (DARI LOG TRANSAKSI) */
$q_keluar = mysqli_query(
    $koneksi,
    "SELECT SUM(jumlah) AS total FROM stok_keluar"
);
$barang_keluar = mysqli_fetch_assoc($q_keluar)['total'] ?? 0;

/* BARANG MASUK & KELUAR (SIMPEL, DARI SELISIH) */
// $q_masuk = mysqli_query($koneksi, "SELECT SUM(stok) AS total FROM barang");
// $barang_masuk = mysqli_fetch_assoc($q_masuk)['total'] ?? 0;

// /* SIMULASI KELUAR */
// $barang_keluar = 0; // placeholder (nanti diambil dari log transaksi)
?>

<link rel="stylesheet" href="../assets/css/style.css">

<div class="sidebar">
  <h2>Stok Barang</h2>
  <a href="dashboard.php" class="active">Dashboard</a>
  <a href="barang.php">Data Barang</a>
  <a href="../auth/login.php">Login Admin</a>
</div>

<div class="content">
  <h1>Dashboard</h1>

  <div class="card">
    <div>Total Stok <b><?= $total_stok ?></b></div>
    <div>Barang Masuk <b><?= $barang_masuk ?></b></div>
    <div>Barang Keluar <b><?= $barang_keluar ?></b></div>
    <div>Stok Menipis <b><?= $stok_menipis ?></b></div>
    <div>Total Jenis <b><?= $total_jenis ?></b></div>
  </div>

  <canvas id="chartStok" height="120"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('chartStok');

new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['Minggu', 'Bulan', 'Triwulan', 'Semester', 'Tahun'],
    datasets: [{
      label: 'Total Stok',
      data: [
        <?= $total_stok ?>,
        <?= $total_stok ?>,
        <?= $total_stok ?>,
        <?= $total_stok ?>,
        <?= $total_stok ?>
      ],
      borderWidth: 2,
      fill: false
    }]
  }
});
</script>

