<?php
session_start();

// SE CREA UN ADMIN, esta hardcodeado no vinculado a una base de datos (Proximamente)
$admin_valido = "admin";
$contrasenia_valida = "1234";

//Traemos los datos del form
$admin = isset($_POST['usuario']) ? $_POST['usuario'] : '';
$contrasenia = isset($_POST['contrasenia']) ? $_POST['contrasenia'] : '';

//Se verifican los datos
if($admin === $admin_valido && $contrasenia === $contrasenia_valida) {
    $_SESSION['usuario'] = $admin;
    header("Location: privado.php");
    exit();
} else {
    echo "Credenciales incorrectas. <a href='login.php'>Intentar de nuevo</a>";
}
?>
