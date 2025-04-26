<?php
global $conexion;
session_start();
$logueado = isset($_SESSION['usuario']);


//Se conecta con la base de datos
include('conexion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pokédex</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f4f4f4;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #ffcb05;
        }
        header img {
            height: 50px;
        }
        header h1 {
            font-size: 36px;
            color: #3d7216;
            margin: 0;
        }
        .login-form {
            display: flex;
            gap: 10px;
        }
        .login-form input {
            padding: 5px;
        }
        .search-section {
            text-align: center;
            margin-top: 50px;
        }
        .search-section input {
            padding: 10px;
            width: 200px;
            margin-right: 10px;
        }
        .search-section button {
            padding: 10px 15px;
            background-color: #3d7216;
            color: white;
            border: none;
            cursor: pointer;
        }
        .search-section button:hover {
            background-color: #2b4e0d;
        }
        .error-message {
            color: red;
            font-weight: bold;
            text-align: center;
            margin-top: 15px;
        }
        table {
            width: 90%;
            margin: 30px auto;
            border-collapse: collapse;
            background-color: white;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: center;
        }
        img.pokemon {
            max-width: 80px;
            height: auto;
        }
        img.tipo {
            max-width: 40px;
            height: auto;
            margin: 0 5px;
        }
    </style>
</head>
<body>

<header>
    <img src="img/Pokedex+tool-1320568182154727832_512px.png" alt="Logo Pokémon">
    <h1>Pokédex</h1>
    <?php if (!$logueado): ?>
        <form class="login-form" method="POST" action="procesar_login.php">
            <input type="text" name="usuario" placeholder="Usuario" required>
            <input type="password" name="contrasenia" placeholder="Contraseña" required>
            <button type="submit">Ingresar</button>
        </form>
    <?php else: ?>
        <p>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?> | <a href="logout.php">Cerrar sesión</a></p>
    <?php endif; ?>
</header>

<?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
    <div class="error-message">Credenciales incorrectas.</div>
<?php endif; ?>

<div class="search-section">
    <input type="text" placeholder="Buscar Pokémon por nombre, tipo o número">
    <button>Buscar</button>
</div>

<!-- Se agrega la tabla con los pokemones-->

<?php

$sql = "SELECT * FROM pokemon";
$resultado = $conexion->query($sql);

if($resultado->num_rows > 0){
    echo "<table>";
    echo "<thread>
            <tr>
                <th>Imagen</th>
                <th>Numero</th>
                <th>Nombre</th>
                <th>Tipo</th>
        </tr>
        </thread>";
    echo '<tbody>';
    while ($fila = $resultado->fetch_assoc()) {
        echo '<tr>';
        echo '<td><img class="pokemon" src="' . $fila['imagen'] . '" alt="' . htmlspecialchars($fila['nombre']) . '"></td>';
        echo '<td>#' . htmlspecialchars($fila['numero']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['nombre']) . '</td>';
        echo '<td>';
        echo '<img class="tipo" src="' . $fila['tipo1'] . '" alt="Tipo 1">';

        echo '</td>';
        echo '</tr>';
    }
    echo '</tbody></table>';
} else {
    echo '<p style="text-align: center;">No hay Pokémon para mostrar.</p>';
}
?>


</body>
</html>

