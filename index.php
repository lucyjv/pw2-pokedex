<?php
global $conexion;

// Se conecta con la base de datos
require_once('conexion.php');

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
    <link rel="stylesheet" href="estilos.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>

<?php include("header.php"); ?>

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
        echo "<td><a class='link-nombre' href='detalle.php?numero=" . htmlspecialchars($fila['numero']) ."'>" . htmlspecialchars($fila['nombre']) . "</td>";
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
