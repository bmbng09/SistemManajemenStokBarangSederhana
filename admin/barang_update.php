<?php
require_once "../middleware/admin_guard.php";
require_once "../config/database.php";
$id = (int)$_GET['id'];
$d = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM barang WHERE id=$id"));

if (isset($_POST['update'])) {
    mysqli_query($koneksi,"UPDATE barang SET
    nama_material='$_POST[nama]',
    min_stock=$_POST[min_stock]
    WHERE id=$id");
    header("Location: index.php");
    exit;
}
?>

<link rel="stylesheet" href="../assets/css/style.css">

<div class="sidebar">
  <h2>Admin Panel</h2>
  <a href="index.php">CRUD Barang</a>
  <a href="../auth/logout.php">Logout</a>
</div>

<div class="content">
  <div class="form-box">
    <h2>Edit Barang</h2>

    <form method="post">
      <div class="form-grid">
        <input 
          name="nama" 
          placeholder="Nama Material"
          value="<?= $d['nama_material'] ?>" 
          required
        >

        <input 
          name="min_stock" 
          type="number"
          placeholder="Minimal Stok"
          value="<?= $d['min_stock'] ?>" 
          required
        >
      </div>

      <br>

      <button name="ok">Update</button>
      <a href="index.php" class="btn">Kembali</a>
    </form>
  </div>
</div>
