<?php global $conexion;
require_once ('conexion.php');
require_once ('header.php');
?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Pokédex</title>
        <link rel="stylesheet" href="estilos.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
        <style>
            .error-message {
                color: #ed4337;
                font-weight: bold;
                text-align: center;
                margin-top: 15px;
            }

            .contenedor-agregar{
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 650px;
            }

            form{
                background-color:white;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                width: 100%;
                max-width: 450px;
                display: flex;
                flex-direction: column;
            }

            form input[type="text"],
            form input[type="file"],
            form select {
                padding:5px;
                border: 1px solid #ccc;
                border-radius: 5px;
                margin-bottom: 10px;
                font-family: Poppins, sans-serif;
            }

            form input[type="submit"] {
                background-color: #ffcb05;
                color: #fff;
                border: none;
                padding:12px;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.2s ease-in-out;
                font-family: Poppins, sans-serif;
                font-weight: bold;
            }

            form input[type="submit"]:hover {
                background-color: #2563eb;

            }

        </style>
    </head>

<?php
$nombre=$_GET['nombre'];
$query=$conexion->query("SELECT * FROM pokemon WHERE nombre='$nombre'");
$pokemon=$query->fetch_assoc();
$logueado = isset($_SESSION['usuario']);

if ($logueado) {
    echo '<div class="contenedor-agregar">';
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
                <option value="dragon">Dragón</option>
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
                  <option value="dragon">Dragón</option>
                <option value="siniestro">Siniestro</option>
                <option value="acero">Acero</option>
                <option value="hada">Hada</option>
            </select>';
    echo 'Imagen: <input type="file" name="imagen" required><br>';
    echo '<input type="submit" value="Enviar">';
    echo '</form>';
    echo '</div>';
} else {
    echo '<div class="error-message">No tiene permiso para editar Pokémones</div>';
}

