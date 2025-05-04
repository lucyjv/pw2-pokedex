<?php

require_once ('conexion.php');

function guardarImagen($numero) {
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $nombreTemporal = $_FILES['imagen']['tmp_name'];
        $nombreFinal = $numero . ".png";
        $destino = 'img/pokemones/' . $nombreFinal;
        move_uploaded_file($nombreTemporal, $destino);
        return $destino;
    }
    return null;
}

$nombre = $_POST['nombre'];
$numero = $_POST['numero'];
$descripcion = $_POST['descripcion'];
$tipo1 = $_POST['tipo1'];
$tipo2 = $_POST['tipo2'];
$id = $_POST['id_incremental'];

$rutaImagen = guardarImagen($numero);

if ($rutaImagen === null) {
    $query = $conexion->query("SELECT imagen FROM pokemon WHERE id_incremental = '$id'");
    $fila = $query->fetch_assoc();
    $rutaImagen = $fila['imagen'];
}

if($tipo2!=""){
    $sql="UPDATE pokemon SET numero = '$numero', nombre = '$nombre', tipo1 = 'img/tipos/$tipo1.png', tipo2 = 'img/tipos/$tipo2.png',
        descripcion = '$descripcion', imagen = '$rutaImagen' WHERE id_incremental = '$id'";
    $conexion->query($sql);
}
else{
    $sql="UPDATE pokemon SET numero = '$numero', nombre = '$nombre', tipo1 = 'img/tipos/$tipo1.png', tipo2 = NULL,
        descripcion = '$descripcion', imagen = '$rutaImagen' WHERE id_incremental = '$id'";
    $conexion->query($sql);
}
header("location: index.php");

?>
