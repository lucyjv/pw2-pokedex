<?php
require_once('conexion.php');


if (isset($_GET['nombre'])) {
    $nombre = $conexion->real_escape_string($_GET['nombre']);


    $sql = "DELETE FROM pokemon WHERE nombre = '$nombre'";

    if ($conexion->query($sql) === TRUE) {
        header("Location: index.php?eliminado=1");
        exit();
    } else {
        header("Location: index.php?eliminado=0");
        exit();
    }
} else {

    header("Location: index.php?eliminado=0");
    exit();
}
?>