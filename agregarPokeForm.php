<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pokédex</title>
    <style>
        .error-message {
            color: #ed4337;
            font-weight: bold;
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<?php
session_start();
$logueado = isset($_SESSION['usuario']);
    if($logueado){
        echo '<form action="agregarPokeFunction.php" method="post" enctype="multipart/form-data">';
        echo 'Nombre: <input type="text" name="nombre" required><br>';
        echo 'Numero <input type="text" name="numero" required><br>';
        echo 'Descripcion: <input type="text" name="descripcion" required><br>';
        echo 'Tipo 1: <select name="tipo1">
                <option value="normal">Normal</option>
                <option value="fuego">Fuego</option>
                <option value="agua">Agua</option>
                <option value="planta">Planta</option>
                <option value="electrico">Eléctrico</option>
                <option value="hielo">Hielo</option>
                <option value="lucha">Lucha</option>
                <option value="veneno">Veneno</option>
                <option value="tierra">Tierra</option>
                <option value="volador">Volador</option>
                <option value="psíquico">Psíquico</option>
                <option value="bicho">Bicho</option>
                <option value="roca">Roca</option>
                <option value="fantasma">Fantasma</option>
                <option value="dragón">Dragón</option>
                <option value="siniestro">Siniestro</option>
                <option value="acero">Acero</option>
                <option value="hada">Hada</option>
            </select>';
        echo 'Tipo 2: <select name="tipo2">
                <option value="">Sin tipo 2</option>
                <option value="normal">Normal</option>
                <option value="fuego">Fuego</option>
                 <option value="agua">Agua</option>
                <option value="planta">Planta</option>
                <option value="electrico">Eléctrico</option>
                 <option value="hielo">Hielo</option>
                 <option value="lucha">Lucha</option>
                 <option value="veneno">Veneno</option>
                 <option value="tierra">Tierra</option>
                 <option value="volador">Volador</option>
                 <option value="psíquico">Psíquico</option>
                 <option value="bicho">Bicho</option>
                  <option value="roca">Roca</option>
                  <option value="fantasma">Fantasma</option>
                  <option value="dragón">Dragón</option>
                <option value="siniestro">Siniestro</option>
                <option value="acero">Acero</option>
                <option value="hada">Hada</option>
            </select>';
        echo 'Imagen: <input type="file" name="imagen" required><br>';
        echo '<input type="submit" value="Enviar">';
    }
    else{
        echo '<div class="error-message">No tiene permiso para agregar Pokémones</div>';
    }

?>