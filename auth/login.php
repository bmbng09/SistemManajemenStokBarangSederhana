<?php
session_start();
require_once "../config/database.php";

$error = "";

if (isset($_POST['login'])) {
    $u = mysqli_real_escape_string($koneksi, $_POST['username']);
    $p = md5($_POST['password']);

    $q = mysqli_query($koneksi,
        "SELECT * FROM admin WHERE username='$u' AND password='$p'"
    );

    if (mysqli_num_rows($q) === 1) {
        $_SESSION['is_admin'] = true;
        header("Location: ../admin/index.php");
        exit;
    } else {
        $error = "Login gagal";
    }
}
?>
<link rel="stylesheet" href="../assets/css/style.css">

<div class="login-wrapper">
  <div class="login-box">
    <h2>Login Admin</h2>

    <form method="post">
      <input name="username" placeholder="Username" required>
      <input name="password" type="password" placeholder="Password" required>
      <button name="login">Login</button>
    </form>
  </div>
</div>

