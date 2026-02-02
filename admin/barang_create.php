<?php
// require_once "../middleware/admin_guard.php";
// require_once "../config/database.php";
require_once __DIR__ . "/../middleware/admin_guard.php";
require_once __DIR__ . "/../config/database.php";


if (isset($_POST['simpan'])) {
    mysqli_query($koneksi,"INSERT INTO barang
    (no_rak,kode_material,nama_material,nama_rak,type,stok,satuan,min_stock,tanggal_pr,mak)
    VALUES(
    '$_POST[no_rak]',
    '$_POST[kode]',
    '$_POST[nama]',
    '$_POST[nama_rak]',
    '$_POST[type]',
    $_POST[stok],
    '$_POST[satuan]',
    $_POST[min_stock],
    '$_POST[tanggal_pr]',
    '$_POST[mak]'
    )");
    header("Location: index.php");
    exit;
}
?>
<link rel="stylesheet" href="../assets/css/style.css">

<div class="sidebar">...</div>

<div class="content">
  <div class="form-box">
    <h2>Tambah Barang</h2>

    <form method="post">
      <div class="form-grid">
        <input name="no_rak" placeholder="No Rak" required>
        <input name="kode" placeholder="Kode Material" required>
        <input name="nama" placeholder="Nama Material" required>
        <input name="nama_rak" placeholder="Nama Rak">
        <input name="type" placeholder="Type">
        <input name="stok" placeholder="Aktual Stock" type="number">
        <input name="satuan" placeholder="Satuan">
        <input name="min_stock" type="number" placeholder="Min Stock">
        <input name="tanggal_pr" type="date">
        <input name="mak" placeholder="MAK">
      </div>

      <br>
      <button name="simpan">Simpan</button>
      <button style="border:none; background:none; padding:0;">
        <a href="index.php" style="
          padding: 8px 14px;
          background: #111;
          color: #fff;
          border-radius: 10px;
          font-size: 13px;
          font-weight: 500;
          cursor: pointer;
          transition: .25s;
          text-decoration: none;
          display: inline-block;
        ">
          Keluar
        </a>
      </button>
      <!-- <button> <a href="index.php">Keluar</a></button> -->
    </form>
  </div>
</div>

