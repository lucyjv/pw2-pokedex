<?php
global $conexion;
require_once ('conexion.php');
function guardarImagen(){
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $nombreTemporal = $_FILES['imagen']['tmp_name'];
        $nombreDeseado = $_POST['numero'];
        $nombreFinal = $nombreDeseado . ".png";
        $destino = 'img/pokemones/' . $nombreFinal;
        move_uploaded_file($nombreTemporal, $destino);
    }
}

$nombre = $_POST['nombre'];
$numero = $_POST['numero'];
$descripcion = $_POST['descripcion'];
$tipo1 = $_POST['tipo1'];
$tipo2 = $_POST['tipo2'];
guardarImagen();




if($tipo2!=""){
    $sql="INSERT INTO pokemon(numero, nombre, tipo1, tipo2, descripcion, imagen) VALUES($numero, '$nombre', 'img/tipos/$tipo1.png', 'img/tipos/$tipo2.png', '$descripcion', 'img/pokemones/$numero.png')";
    $conexion->query($sql);
}
else{
    $sql="INSERT INTO pokemon(numero, nombre, tipo1, tipo2, descripcion, imagen) VALUES($numero, '$nombre', 'img/tipos/$tipo1.png', NULL , '$descripcion', 'img/pokemones/$numero.png')";
    $conexion->query($sql);
}
header("location: index.php");
exit();