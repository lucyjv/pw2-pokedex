<?php

$conexion  = new mysqli("localhost","root","","pokedex");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>