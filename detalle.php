<?php
global $conexion;
require_once('conexion.php');
include("header.php");

$numero = $_GET['numero'];
$sql = "SELECT * FROM pokemon WHERE numero = $numero";
$resultado = $conexion->query($sql);

$pokemon = $resultado->fetch_assoc();

$imagen = $pokemon['imagen'];
$nombre = $pokemon['nombre'];
$tipo1 = $pokemon['tipo1'];
$tipo2 = $pokemon['tipo2'];
$descripcion = $pokemon['descripcion'];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pokédex</title>
    <link rel="stylesheet" href="estilos.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
<main>
    <div class="pokemon-detalle">
        <div class="imagen-grande">
            <img src="<?= htmlspecialchars($imagen) ?>" alt="<?= htmlspecialchars($nombre) ?>">
        </div>
        <div class="contenido">
            <h2><?= htmlspecialchars($nombre) ?></h2>
            <div class="tipos">
                <img src="<?= htmlspecialchars($tipo1) ?>" alt="<?= htmlspecialchars($tipo1) ?>">
                <?php if ($tipo2 != null): ?>
                    <img src="<?= htmlspecialchars($tipo2) ?>" alt="<?= htmlspecialchars($tipo2) ?>">
                <?php endif; ?>
            </div>
            <p><?= htmlspecialchars($descripcion) ?></p>
        </div>
    </div>
</main>
</body>
</html>
