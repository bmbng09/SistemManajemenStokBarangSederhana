<?php
require_once "../middleware/admin_guard.php";
require_once "../config/database.php";
$id = (int)$_GET['id'];

if (isset($_POST['ok'])) {
    mysqli_query($koneksi,"UPDATE barang SET stok = stok + $_POST[jumlah] WHERE id=$id");
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
    <h2>Stok Masuk</h2>

    <form method="post">
      <div class="form-grid full">
        <input 
          type="number" 
          name="jumlah" 
          placeholder="Jumlah stok masuk"
          required
          min="1"
        >
      </div>

      <br>

      <button name="ok">Tambah Stok</button>
      <a href="index.php" class="btn">Kembali</a>
    </form>
  </div>
</div>
