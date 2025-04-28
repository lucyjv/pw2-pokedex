<?php
global $conexion;
session_start();
$logueado = isset($_SESSION['usuario']);

// Se conecta con la base de datos
include('conexion.php');

// Capturar búsqueda (si existe)
$busqueda = "";
if (isset($_GET['busqueda'])) {
    $busqueda = $conexion->real_escape_string($_GET['busqueda']);
}

// Si escribió algo en el buscador
if (!empty($busqueda)) {
    $sql = "SELECT * FROM pokemon WHERE LOWER(nombre) LIKE LOWER('%$busqueda%')";
} else {
    // Si no escribió nada, traer todos los pokemones
    $sql = "SELECT * FROM pokemon";
}

$resultado = $conexion->query($sql);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pokédex</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');
        body { font-family: Poppins, sans-serif; margin: 0; background-color: #f4f4f4; }
        header { display: flex; justify-content: space-between; align-items: center; padding: 20px; background-color: #ffcb05; }
        header img { height: 60px; }
        header h1 { font-size: 36px; color: black; margin: 0 auto; font-weight: 600; }
        .login-form { display: flex; gap: 10px; }
        .login-form input { width: 200px; height: 25px; padding: 5px; border: 1px solid black; border-radius: 15px; }
        .login-form button { padding: 5px 10px; border: 1px solid black; border-radius: 10px; font-weight: 500; }
        .search-section { text-align: center; margin-top: 30px; }
        .search-section input { padding: 10px; width: 400px; margin-right: 10px; }
        .search-section button { padding: 10px 15px; background-color: #3d7216; color: white; border: none; cursor: pointer; }
        table { width: 70%; margin: 30px auto; border-collapse: collapse; background-color: white; }
        th, td { padding: 12px; border: 2px solid #ccc; text-align: center; }
        img.pokemon { max-width: 100px; height: auto; }
        img.tipo { max-width: 100px; height: auto; }
        .boton-agregar { padding: 10px 15px; background-color: #3d7216; color: white; border: none; cursor: pointer; display: block; margin: 20px auto; }
        .error-message { color: #ed4337; font-weight: bold; text-align: center; margin-top: 15px; }
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
    <div class="error-message">¡El usuario o la contraseña son incorrectos!</div>
<?php endif; ?>

<div class="search-section">
    <form method="GET" action="index.php">
        <input type="text" name="busqueda" placeholder="Buscar Pokémon por nombre" value="<?php echo htmlspecialchars($busqueda); ?>">
        <button type="submit">Buscar</button>
    </form>
</div>

<?php
// Mostrar pokemones
if ($resultado->num_rows > 0) {
    echo "<table>";
    echo "<thead>
            <tr>
                <th>Imagen</th>
                <th>Número</th>
                <th>Nombre</th>
                <th>Tipo 1</th>
                <th>Tipo 2</th>";
    if ($logueado) {
        echo "<th>Opciones Admin</th>";
    }
    echo "</tr>
        </thead>";
    echo "<tbody>";

    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td><img class='pokemon' src='" . htmlspecialchars($fila['imagen']) . "' alt='" . htmlspecialchars($fila['nombre']) . "'></td>";
        echo "<td>#" . htmlspecialchars($fila['numero']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
        echo "<td><img class='tipo' src='" . htmlspecialchars($fila['tipo1']) . "' alt='Tipo 1'></td>";
        echo "<td>";
        if ($fila['tipo2'] != NULL) {
            echo "<img class='tipo' src='" . htmlspecialchars($fila['tipo2']) . "' alt='Tipo 2'>";
        } else {
            echo "-";
        }
        echo "</td>";

        if ($logueado) {
            echo "<td>
                    <button onclick=\"window.location.href='editarPoke.php?id=" . $fila['nombre'] . "'\" class='boton-editar'>Editar</button>
                    <button class='boton-eliminar'>Eliminar</button>
                  </td>";
        }
        echo "</tr>";
    }

    echo "</tbody></table>";

} else {
    echo "<p style='text-align:center;'>No se encontró ningún Pokémon con ese nombre.</p>";
}

if ($logueado) {
    echo '<button onclick="window.location.href=\'agregarPokeForm.php\'" class="boton-agregar">Agregar un nuevo Pokémon</button>';
}
?>

</body>
</html>
