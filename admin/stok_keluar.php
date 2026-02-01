<?php
require_once "../middleware/admin_guard.php";
require_once "../config/database.php";

$id = $_GET['id'] ?? 0;

// ambil data barang
$barang = mysqli_fetch_assoc(
    mysqli_query($koneksi, "SELECT * FROM barang WHERE id='$id'")
);

if (!$barang) {
    die("Barang tidak ditemukan");
}

if (isset($_POST['ok'])) {
    $jumlah = (int)$_POST['jumlah'];

    // validasi stok
    if ($jumlah > 0 && $jumlah <= $barang['stok']) {

        // 1. kurangi stok barang
        mysqli_query(
            $koneksi,
            "UPDATE barang SET stok = stok - $jumlah WHERE id='$id'"
        );

        // 2. CATAT KE TABEL stok_keluar
        mysqli_query(
            $koneksi,
            "INSERT INTO stok_keluar (barang_id, jumlah) 
             VALUES ('$id', '$jumlah')"
        );

        header("Location: index.php");
        exit;
    }
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
    <h2>Stok Keluar</h2>

    <form method="post">
      <div class="form-grid full">
        <input 
          type="number" 
          name="jumlah" 
          placeholder="Jumlah stok keluar"
          required
          min="1"
          max="<?= $barang['stok'] ?>"
        >
      </div>

      <br>

      <button name="ok">Kurangi Stok</button>
      <a href="index.php" class="btn">Kembali</a>
    </form>
  </div>
</div>
