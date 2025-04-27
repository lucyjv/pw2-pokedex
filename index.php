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
        @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        body {
            font-family: Poppins, sans-serif;
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
            height: 60px;
        }
        header h1    {
            font-size: 36px;
            color: black;
            margin:0 0 0 450px;
            font-weight: 600;

        }
        .login-form {
            display: flex;
            gap: 10px;

        }
        .login-form input {
            width: 200px;
            height: 25px;
            padding: 5px;
            border: 1px solid black;
            border-radius:15px;
            font-family: Poppins, sans-serif;
        }

        .login-form button {
            padding: 5px 10px;
            border: 1px solid   black;
            border-radius: 10px;
            font-family: Poppins, sans-serif;
            font-weight: 500;
        }

        .search-section {
            text-align: center;
            margin-top: 50px;
        }
        .search-section input {
            padding: 10px;
            width: 600px;
            margin-right: 10px;
            font-family: Poppins, sans-serif;
        }
        .search-section button {
            padding: 10px 15px;
            background-color: #3d7216;
            font-family: Poppins, sans-serif;
            font-weight: 500;
            color: white;
            border: none;
            cursor: pointer;
        }
        .search-section button:hover {
            background-color: #2b4e0d;
        }
        .error-message {
            color: #ed4337;
            font-weight: bold;
            text-align: center;
            margin-top: 15px;
        }
        table {
            width: 70%;
            margin: 30px auto;
            border-collapse: collapse;
            background-color: white;
        }
        th, td {
            padding: 12px;
            border: 2px solid #ccc;
            text-align: center;
            font-size: 20px;
        }
        img.pokemon {
            max-width: 100px;
            height: auto;
            cursor: pointer;
        }
        img.tipo {
            max-width: 100px;
            height: auto
        }
    </style>
</head>
<body>

<header>
    <img src="img/images.png" alt="Logo Pokémon">
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
    <div class="error-message">El usuario o la contraseña son incorrectos!</div>
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
        echo '<td><img class="tipo" src="' . $fila['tipo1'] . '" alt="Tipo 1"></td>';
        if ($fila['tipo2']!= NULL){
            echo '<td><img class="tipo" src="' . $fila['tipo2'] . '" alt="Tipo 2"></td>';
        }
        else{
            echo '<td> -</td>';
        }
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

