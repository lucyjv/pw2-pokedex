<?php
global $conexion;
session_start();
require_once('conexion.php');

//Traemos los datos del form
$admin = isset($_POST['usuario']) ? $_POST['usuario'] : '';
$contrasenia = isset($_POST['contrasenia']) ? $_POST['contrasenia'] : '';

if (!empty($admin) && !empty($contrasenia)) {
    //Consulta a la base de datos
    $query = "SELECT * FROM administradores WHERE usuario = '$admin' AND contrasenia = '$contrasenia'";

    //Ejecuta la consulta
    //No estoy usando execute ni los bind_param para evitar inyecciones
    $resultado = mysqli_query($conexion,$query);
    //Verifica si nos devolvio una fila

    if (mysqli_num_rows($resultado) === 1){
        $_SESSION['usuario'] = $admin;
        header("Location: index.php");
        exit();
    } else {
    header("Location: index.php?error=1");
    exit();
    }

}else{
    header("Location: index.php?error=2");
    exit();
}
?>
