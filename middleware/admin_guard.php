<?php
session_start();

if (!isset($_SESSION['is_admin'])) {
    header("Location: ../auth/login.php");
    exit;
}
