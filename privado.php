<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Muestra el index que todavia no existe
include 'index.php';
?>
