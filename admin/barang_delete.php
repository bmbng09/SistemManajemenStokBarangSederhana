<?php
require_once "../middleware/admin_guard.php";
require_once "../config/database.php";
$id = (int)$_GET['id'];
mysqli_query($koneksi,"DELETE FROM barang WHERE id=$id");
header("Location: index.php");
exit;
